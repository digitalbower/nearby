<script>
document.addEventListener('DOMContentLoaded', () => {
    const loader = document.getElementById('page-loader');

    if (window.showLoader && loader) {
        loader.style.display = 'block';
    }

    document.querySelectorAll('form[data-redirect], form.redirect-form').forEach(form => {
        form.addEventListener('submit', () => {
            loader.style.display = 'block';
        });
    });

    document.querySelectorAll('a[data-redirect]').forEach(link => {
        link.addEventListener('click', () => {
            loader.style.display = 'block';
        });
    });

    // Hide loader on full load
    window.addEventListener('load', () => {
        setTimeout(() => {
            if (loader) loader.style.display = 'none';
        }, 500);
    });
});
</script>
