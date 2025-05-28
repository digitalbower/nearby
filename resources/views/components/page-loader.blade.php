<div id="page-loader" class="loader-overlay">
    <div class="travel-loader">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<style>
.loader-overlay {
    position: fixed;
    inset: 0;
    background-color: #fff;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}
.travel-loader {
    display: flex;
    gap: 10px;
}
.travel-loader span {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #00aaff;
    animation: bounce 1s infinite ease-in-out;
}
.travel-loader span:nth-child(2) { animation-delay: 0.2s; }
.travel-loader span:nth-child(3) { animation-delay: 0.4s; }

@keyframes bounce {
    0%, 80%, 100% { transform: scale(0.8); opacity: 0.6; }
    40% { transform: scale(1.4); opacity: 1; }
}
</style>
