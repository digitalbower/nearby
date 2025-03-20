<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    @keyframes gradientAnimation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    .animated-bg {
        background: linear-gradient(45deg, #06b6d4, #0891b2, #0e7490);
        background-size: 200% 200%;
        animation: gradientAnimation 20s ease infinite;
    }
    body {
font-family: 'Poppins', sans-serif;
font-weight: 400;
}
    .floating-shape {
        position: absolute;
        width: 5rem;
        height: 5rem;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }
</style>