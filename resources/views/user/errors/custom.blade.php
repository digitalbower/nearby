<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404 ERROR</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<style type="text/tailwindcss">
@theme {
--color-clifford: #da373d;
}

@media screen and (max-width:1199px) {

.error-bg-shap{
    background-position: 0 200px !important;
}

}
</style>
</head>
<body>
<div class="w-full h-screen error-bg-shap" style="background-image: url(images/wave.svg);background-size: cover;
    background-position: 0 300px;
    background-repeat: no-repeat;">
    <div class="h-screen xl:overflow-hidden">
        <div class="grid md:grid-cols-2 items-center h-screen relative">
            <div class="md:py-10 py-5 md:px-5 xl:px-10 px-2 absolute top-0 left-0 w-full z-10">
                <div class="container mx-auto flex items-center justify-between text-center md:text-left ">
                    <a href="" class="inline-block">
                        <img src="{{asset('images/admin-logo.svg')}}" alt="logo" class="w-36 object-fit">
                    </a>

                    <div class="">
                        <a href="" class="inline-block font-medium"><i class="fa-solid fa-right-to-bracket mr-1"></i> Login</a>
                        <a href="" class="inline-block font-medium ml-4"><i class="fa-solid fa-user-plus mr-1"></i> Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="text-center md:text-left md:order-first order-second h-full p-5 bg-[#58af0838]">                
                <div class="md:pt-0 pt-10 lg:pl-5 xl:pl-10 h-full md:grid items-center">
                    <!-- <img src="{{asset('images/error-img.png')}}" alt="logo" class="w-half object-fit"> -->
                     <div class="">
                        <h1 class="xl:text-7xl lg:text-5xl text-4xl font-bold text-black mb-4">Error {{ $code }} - {{ $title }}</h1>
                        <p class="md:text-xl text-md my-8">{{ $message }}</p>
                        <a href="{{ url('/') }}" class="px-10 py-3 bg-[#58af0838] text-black inline-block rounded-lg hover:bg-green-200 transition font-medium">Return to Home</a>
                    </div>
                </div>
            </div>
            <div class="md:order-second order-first pt-10 md:pt-0">
                <img src="{{asset('images/error-i.jpg')}}" alt="" class="object-contain inline-block w-full object-center h-full" alt="">
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
<script>
  tailwind.config = {
    darkMode: "class",
    theme: {
      extend: {
        colors: {
          primary: {
            50: "#f0f9ff",
            100: "#e0f2fe",
            200: "#bae6fd",
            300: "#7dd3fc",
            400: "#38bdf8",
            500: "#0ea5e9",
            600: "#0284c7",
            700: "#0369a1",
            800: "#075985",
            900: "#0c4a6e",
            950: "#0b2e4f",
          },
          background: "#ffffff",
          foreground: "#000000",
          muted: "#f3f4f6",
          "muted-foreground": "#6b7280",
          accent: "#fbbf24",
          "accent-foreground": "#000000",
        },
      },
      fontFamily: {
        body: ["Poppins", "sans-serif"],  /* Set Poppins as the body font */
        sans: [
          "Arial",
          "ui-sans-serif",
          "system-ui",
          "-apple-system",
          "system-ui",
          "Segoe UI",
          "Roboto",
          "Helvetica Neue",
          "Arial",
          "Noto Sans",
          "sans-serif",
          "Apple Color Emoji",
          "Segoe UI Emoji",
          "Segoe UI Symbol",
          "Noto Color Emoji",
        ],
      },
    },
  };
</script>
</body>
</html>