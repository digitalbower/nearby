@extends('admin.layouts.masteradmin')
@section('title', 'Product variants')
@section('content')
  
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-lg bg-white rounded-3">
        <h4 class="text-start mb-4">Add New Blackout dates</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('admin.products.product_variants.blackout_dates.update', $id) }}"  id="blackoutForm" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product_variant_id" class="form-label">Product Variants</label>
                <select class="form-control" name="product_variant_id" id="product_variant_id">
                    <option value="{{ $product_variant->id }}" data-bookable_start="{{ $product_variant->bookable_start_date }}" data-bookable_end = "{{ $product_variant->bookable_end_date}}" data-product="{{$product_variant->product->name}}"
                        {{ $blackoutDateConfig->product_variant_id ?? $product_variant->id ?? '' == $id ? 'selected' : '' }}>
                        {{ $product_variant->title }}
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="date_type" class="form-label">Types</label>
                <select class="form-control" name="date_type" id="date_type">
                    <option value="">Types</option>
                    @foreach (['selected_days', 'week_ends', 'week_days', 'mixed_weekends', 'mixed_weekdays'] as $type)
                        <option value="{{ $type }}"
                            {{ (old('date_type') ?? ($blackoutDateConfig->date_type ?? '')) == $type ? 'selected' : '' }}>
                            {{ ucwords(str_replace('_', ' ', $type)) }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3" id="blackout_dates_container">
                    <label for="blackout_dates" class="form-label">Blackout Dates</label>
                    <input type="text" class="form-control" id="blackout_dates" name="blackout_dates" autocomplete="off">
                    <div id="blackout-error" class="text-danger mt-2" style="display: none;"></div>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.products.product_variants.index') }}" class="btn btn-secondary ms-3">Cancel</a>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/js/custom/js/product_variant.js') }}?v={{ date('YmdHis') }}"></script>
<script>
$(function () {
    const blackoutDates = @json($blackoutDates ?? []);
    const blackoutConfig = @json($blackoutDateConfig ?? null);
    const $blackout = $('#blackout_dates');
    const $variant = $('#product_variant_id');
    const $dateType = $('#date_type');
    const $errorBox = $('#blackout-error');

    let lastSelectedDates = [];

    function getSelectedVariantDates() {
        const $selectedOption = $variant.find(':selected');
        return {
            start: $selectedOption.data('bookable_start'),
            end: $selectedOption.data('bookable_end')
        };
    }

    function generateDateRange(startStr, endStr) {
        const start = new Date(startStr);
        const end = new Date(endStr);
        const all = [];

        for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
            all.push($.datepicker.formatDate('yy-mm-dd', new Date(d)));
        }

        return all;
    }

    function filterByType(dates, type) {
        return dates.filter(dateStr => {
            const day = new Date(dateStr).getDay();
            if (type === 'week_ends') return day === 0 || day === 6;
            if (type === 'week_days') return day >= 1 && day <= 5;
            if (type === 'mixed_weekdays') return day >= 1 && day <= 5;
            if (type === 'mixed_weekends') return day === 0 || day === 6;
            return true;
        });
    }

    function validateAndSetDates(currentDates, start, end, type) {
        const startDate = $.datepicker.parseDate('yy-mm-dd', start);
        const endDate = $.datepicker.parseDate('yy-mm-dd', end);

        const valid = [];
        const invalidOutOfRange = [];
        const invalidDayType = [];

        currentDates.forEach(dateStr => {
            const d = $.datepicker.parseDate('yy-mm-dd', dateStr);

            if (d < startDate || d > endDate) {
                invalidOutOfRange.push(dateStr);
                return;
            }

            const day = d.getDay();

            if (type === 'mixed_weekends' && day !== 0 && day !== 6) {
                invalidDayType.push(dateStr);
                return;
            }

            if (type === 'mixed_weekdays' && (day === 0 || day === 6)) {
                invalidDayType.push(dateStr);
                return;
            }

            valid.push(dateStr);
        });

        $blackout.multiDatesPicker('resetDates', 'picked');
        if (valid.length > 0) {
            $blackout.multiDatesPicker('addDates', valid);
        }

        $blackout.val(valid.join(','));

        if (invalidOutOfRange.length > 0 || invalidDayType.length > 0) {
            let msg = '';
            if (invalidOutOfRange.length > 0) {
                msg += `❌ Outside range: ${invalidOutOfRange.join(', ')}. `;
            }
            if (invalidDayType.length > 0) {
                msg += `❌ Invalid day type: ${invalidDayType.join(', ')}.`;
            }
            $errorBox.text(msg).show().fadeOut(6000);
        } else {
            $errorBox.hide();
        }

        lastSelectedDates = [...valid];
    }

    function syncDates() {
        const { start, end } = getSelectedVariantDates();
        const type = $dateType.val();
        const selectedDates = $blackout.multiDatesPicker('getDates') || [];
        validateAndSetDates(selectedDates, start, end, type);
    }

    function initPicker(minDate, maxDate, preloaded = [], editable = true) {
        if ($blackout.hasClass('hasDatepicker')) {
            $blackout.multiDatesPicker('destroy');
        }

        $blackout.val('');

        $blackout.multiDatesPicker({
            dateFormat: 'yy-mm-dd',
            maxPicks: 30,
            minDate: minDate,
            maxDate: maxDate,
            beforeShowDay: function (date) {
                if (!editable) return [false, '', 'Date selection disabled'];

                const type = $dateType.val();
                const day = date.getDay();

                if (type === 'mixed_weekends' && day !== 0 && day !== 6) return [false, '', 'Only weekends allowed'];
                if (type === 'mixed_weekdays' && (day === 0 || day === 6)) return [false, '', 'Only weekdays allowed'];

                return [true, '', ''];
            },
            onSelect: function () {
                if (editable) syncDates();
            }
        });

        $blackout.multiDatesPicker('resetDates', 'picked');
        if (preloaded.length > 0) {
            $blackout.multiDatesPicker('addDates', preloaded);
            $blackout.val(preloaded.join(','));
            lastSelectedDates = [...preloaded];
        } else {
            lastSelectedDates = [];
        }

        $blackout.prop('readonly', !editable);

        // Setup polling to detect removals
        if (editable) {
            clearInterval(window._blackoutPoll);
            window._blackoutPoll = setInterval(() => {
                const currentDates = $blackout.multiDatesPicker('getDates') || [];
                if (JSON.stringify(currentDates) !== JSON.stringify(lastSelectedDates)) {
                    syncDates();
                }
            }, 300);
        } else {
            clearInterval(window._blackoutPoll);
        }
    }
function updatePickerBasedOnSelection() {
    const { start, end } = getSelectedVariantDates();
    const type = $dateType.val();

    if (!start || !end) {
        $blackout.multiDatesPicker('destroy');
        $blackout.val('');
        clearInterval(window._blackoutPoll);
        return;
    }

    const allDates = generateDateRange(start, end);

    // Find DB dates for the exact type and in range
   

    const dbDatesInRange = blackoutDates
    .filter(obj => obj.type === type)
    .map(obj => obj.date)
    .filter(dateStr => dateStr >= start && dateStr <= end);


    let selected = [];
    let editable = true;

    if (dbDatesInRange.length > 0) {
        // Use DB data if it exists for this type
        selected = dbDatesInRange;
         editable = (type === 'mixed_weekends'
             || type === 'mixed_weekdays'
             || type === 'selected_days');
    }else {
        // Otherwise fallback to default filtered preselects
        switch (type) {
            case 'week_ends':
                selected = filterByType(allDates, 'week_ends');
                editable = false;
                break;
            case 'week_days':
                selected = filterByType(allDates, 'week_days');
                editable = false;
                break;
            case 'mixed_weekends':
                selected = filterByType(allDates, 'mixed_weekends');
                editable = true;
                break;
            case 'mixed_weekdays':
                selected = filterByType(allDates, 'mixed_weekdays');
                editable = true;
                break;
            case 'selected_days':
                selected = [];
                editable = true;
                break;
            default:
                selected = [];
                editable = true;
                break;
        }
    }

    initPicker(start, end, selected, editable);
}


    $variant.on('change', updatePickerBasedOnSelection);
    $dateType.on('change', updatePickerBasedOnSelection);

    $blackout.on('focus', function () {
        const { start, end } = getSelectedVariantDates();
        if (!start || !end) {
            $errorBox.text("Please select a product variant with booking dates first.").show().fadeOut(5000);
            $(this).blur();
        }
    });

    updatePickerBasedOnSelection();
});


</script>
@endpush


