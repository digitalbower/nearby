@extends('admin.layouts.masteradmin')

@section('content')
<div class="card shadow-none bg-transparent px-4 mt-5">
    <div class="card-body shadow-lg bg-white">
        <div class="container mt-5">
            <h2>Create Footer</h2>

            <form action="{{ route('admin.blog.footer.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="type" class="form-label">Footer Type</label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="">-- Select Type --</option>
                        <option value="text">Footer Text</option>
                        <option value="social">Social Media Icon</option>
                    </select>
                </div>

                <!-- Footer Text Section -->
                <div id="footer-text-section" class="d-none">
                    <div class="mb-3">
                        <label for="footer_text" class="form-label">Footer Text</label>
                        <textarea name="footer_text" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="footer_link" class="form-label">Text Link</label>
                        <input type="url" name="footer_link" class="form-control">
                    </div>
                </div>

                <!-- Single Social Media Section -->
                <div id="social-section" class="d-none">
                    <div class="mb-3">
                        <label class="form-label">Select Social Media</label>
                        <select id="svgSelector" name="social_icon" class="form-select" required>
                            <option value="">Select Platform</option>
                            <option value="facebook">Facebook</option>
                            <option value="instagram">Instagram</option>
                            <option value="linkedin">LinkedIn</option>
                           
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Social Media URL</label>
                        <input type="url" name="social_link" class="form-control" required>
                    </div>
                </div>

                <input type="hidden" name="social_svg" id="social_svg">
                <button type="submit" class="btn btn-success mt-4">Create Footer</button>
            </form>
        </div>
    </div>
</div>

<script>
 
    function toggleSections() {
        const type = document.getElementById('type').value;

        const footerTextSection = document.getElementById('footer-text-section');
        const socialSection = document.getElementById('social-section');

        const footerText = document.querySelector('textarea[name="footer_text"]');
        const footerLink = document.querySelector('input[name="footer_link"]');
        const socialIcon = document.querySelector('select[name="social_icon"]');
        const socialLink = document.querySelector('input[name="social_link"]');

        // Hide both sections and remove required
        footerTextSection.classList.add('d-none');
        socialSection.classList.add('d-none');

        footerText.removeAttribute('required');
        footerLink.removeAttribute('required');
        socialIcon.removeAttribute('required');
        socialLink.removeAttribute('required');

        // Enable section and set required fields
        if (type === 'text') {
            footerTextSection.classList.remove('d-none');
            footerText.setAttribute('required', true);
            footerLink.setAttribute('required', true);
        } else if (type === 'social') {
            socialSection.classList.remove('d-none');
            socialIcon.setAttribute('required', true);
            socialLink.setAttribute('required', true);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        toggleSections(); // Initial load
        document.getElementById('type').addEventListener('change', toggleSections);
    });
</script>
<script>
    const svgMap = {
        facebook: `<svg viewBox="0 0 320 512" width="20" height="20"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>`,
        instagram: ` <svg viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" /></svg>`,
        linkedin: `<svg viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" /></svg>`,
       
    };

    document.getElementById('svgSelector').addEventListener('change', function () {
        const selected = this.value;
        document.getElementById('social_svg').value = svgMap[selected] || '';
    });
</script>


@endsection
