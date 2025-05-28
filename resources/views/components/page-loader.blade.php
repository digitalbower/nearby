<!-- Loader Component -->
<div id="page-loader" class="page-loader" style="display: none;">
    <div class="loader-overlay">
        <div class="loader-content">
            <div class="spinner"></div>
            <p class="loader-text">Loading...</p>
        </div>
    </div>
</div>

<style>
.page-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
}

.loader-overlay {
    background: rgba(255, 255, 255, 0.8);
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader-content {
    text-align: center;
}

.spinner {
    width: 50px;
    height: 50px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loader-text {
    font-size: 16px;
    color: #333;
}
</style>
