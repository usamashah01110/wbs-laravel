<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WBS | Will Be Sent</title>
    <meta name="description" content="willbesent"/>
    <meta name="keywords" content="willbesent"/>
    <meta name="author" content="willbesent"/>

    <!-- favicon -->
    <link href="{{ asset('WBS-Logo.png') }}" rel="shortcut icon">

    <!-- Main Css -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar transition-all duration-500 py-5 items-center shadow-md lg:shadow-none [&.is-sticky]:bg-white group [&.is-sticky]:shadow-md bg-white lg:bg-transparent" id="navbar">
        <div class="container">

            <div class="flex lg:flex-nowrap flex-wrap items-center">

                <a href="index-1.html" class="flex items-center">
                    <img src="{{ asset('WBS-Logo.png') }}" class="h-9 flex">
                </a>

                <div class="lg:hidden flex items-center ms-auto px-2.5">
                    <button class="hs-collapse-toggle" type="button" id="hs-unstyled-collapse" data-hs-collapse="#navbarCollapse">
                        <i data-lucide="menu" class="h-8 w-8 text-black"></i>
                    </button>
                </div>

                <div class="navigation hs-collapse transition-all duration-300 lg:basis-auto basis-full grow hidden items-center justify-center lg:flex mx-auto overflow-hidden mt-6 lg:mt-0 nav-light" id="navbarCollapse">
                    <ul class="navbar-nav flex-col lg:flex-row gap-y-2 flex lg:items-center justify-center" id="navbar-navlist">
                        <li class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark all duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize" href="#home">Home</a>
                        </li>

                        <li class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize" href="#services">Services</a>
                        </li>

                        <li class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize" href="#features">Features</a>
                        </li>

                        <li class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize" href="#about">About</a>
                        </li>

                        <li class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize" href="#pricing">Pricing</a>
                        </li>

                        <li class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize" href="#testimonial">Testimonials</a>
                        </li>

                        <li class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize" href="#blog">Blog</a>
                        </li>

                        <li class="nav-item mx-1.5 transition-all text-dark lg:text-black group-[&.is-sticky]:text-dark duration-300 hover:text-primary [&.active]:!text-primary group-[&.is-sticky]:[&.active]:text-primary">
                            <a class="nav-link inline-flex items-center text-sm lg:text-base font-medium py-0.5 px-2 capitalize" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>

                <div class="ms-auto shrink hidden lg:inline-flex gap-2">
                    <a href="#" class="py-2 px-6 inline-flex items-center gap-2 rounded-md text-base text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium">
                        <i data-lucide="download-cloud" class="h-4 w-4 fill-white/40"></i>
                        <span class="hidden sm:block">Download</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>



    <!-- =========== Hero Section Start =========== -->
    <section class="relative bg-gray-200/40 bg-[url(../images/home/bg-3.png)] bg-no-repeat bg-cover" id="home">
        <div class="container">

            <div class="grid lg:grid-cols-2 grid-cols-1 gap-x-6 gap-y-10 items-center">
                <div class="">
                    <h1 class="text-3xl md:text-5xl/tight lg:text-6xl/tight text-black tracking-normal capitalize leading-normal font-bold max-w-2xl">The Best Approach To Consent To Interior Design</h1>
                    <p class="text-base font-medium text-muted mt-3 capitalize">You one stop finance empower platform Manage all your business expenses with our supafast app.</p>

                    <div class="flex flex-wrap mt-9 text-center gap-3">
                        <button class="py-2 px-6 rounded-md text-white text-base bg-primary hover:bg-primaryDark border border-primary hover:border-primaryDark transition-all duration-500 font-medium">Get A Free Demo</button>
                        <button  class="py-2 px-6 text-primary rounded-md border border-primary text-base hover:border-primary hover:bg-primary hover:text-white transition-all duration-500 font-medium">See Pricing</button>
                    </div>
                </div>

                <div class="relative">
                    <img src="assets/images/interior.png" class="md:h-[700px] lg:ms-auto mx-auto" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Start -->
    <section id="services" class="py-20">
        <div class="container">
            <div class="max-w-2xl mx-auto text-center">
                <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Services</span>
                <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Build a customer - centric marketing strategy</h2>
                <p class="text-base font-medium mt-4 text-muted">Ligula risus auctor tempus magna feugit lacinia.</p>
            </div>

            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-x-3 gap-y-6 md:gap-y-12 lg:gap-y-24 md:pt-20 pt-12">

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="menu" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Market Research</h1>
                    <p class="text-base text-gray-600 mt-2">Gain a comprehensive understanding of your industry landscape.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="lightbulb" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">User Experience</h1>
                    <p class="text-base text-gray-600 mt-2">Evaluate the viability and potential of new products or services.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="bar-chart-big" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Digital Marketing</h1>
                    <p class="text-base text-gray-600 mt-2">Benchmark your performance against competitors, identify strengths.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="codepen" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">SEO Services</h1>
                    <p class="text-base text-gray-600 mt-2">Anticipate market shifts and emerging trends to stay ahead of the curve.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="shield" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Market Research</h1>
                    <p class="text-base text-gray-600 mt-2">Our market research services are designed to provide maximum value.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="rocket" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Software Development</h1>
                    <p class="text-base text-gray-600 mt-2">We go beyond data collection to provide actionable insights.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="layers-2" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Affiliate Marketing</h1>
                    <p class="text-base text-gray-600 mt-2">We understand that every business is unique. That's why we offer.</p>
                </div>

                <div class="text-center">
                    <div class="flex items-center justify-center">
                        <div class="items-center justify-center flex bg-primary/10 rounded-[49%_80%_40%_90%_/_50%_30%_70%_80%] h-20 w-20 border">
                            <i data-lucide="webcam" class="h-10 w-10 text-primary"></i>
                        </div>
                    </div>
                    <h1 class="text-xl font-semibold pt-4">Website Development</h1>
                    <p class="text-base text-gray-600 mt-2">In today's competitive market, timing is everything. Our efficient.</p>
                </div>
            </div>

        </div>
    </section>
    <!-- Services End -->

    <!-- Feature Start -->
    <section id="features" class="py-20">
        <div class="container">

            <div class="grid lg:grid-cols-2 items-center gap-6">
                <div class="flex items-center">
                    <img src="assets/images/feature.jpg" class="h-[650px] rounded-xl mx-auto" alt="feature section">
                </div>

                <div class="lg:ms-5 ms-8">
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Focused on achievind</span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Achievement Via Our Distinct Methodology</h2>
                    <a href="#" class="inline-flex items-center justify-center gap-3 text-sm font-medium text-black mt-6">Learn More
                        <i data-lucide="move-right"></i>
                    </a>
                    <hr class="border-gray-200 my-6"></hr>

                    <div class="flex items-start gap-5">
                        <div>
                            <div class="w-12 h-12 rounded-full border border-dashed border-primary/40 bg-primary/10 flex items-center justify-center">
                                <i data-lucide="check" class="text-base text-blue-600"></i>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">Manage markets with empowerment</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Empower yourself to effectively manage
                                markets with confidence. utilizing strategic insights and resources for success.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5 mt-8">
                        <div>
                            <div class="w-12 h-12 rounded-full border border-dashed border-primary/40 bg-primary/10 flex items-center justify-center">
                                <i data-lucide="layers-2" class="text-base text-blue-600"></i>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">Manage your design and architecture</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Achieve task completion optimization by
                                effectively managing time and resources, ensuring timely delivery and efficiency.</p>
                        </div>

                    </div>

                    <div class="flex items-start gap-5 mt-8">
                        <div>
                            <div class="w-12 h-12 rounded-full border border-dashed border-primary/40 bg-primary/10 flex items-center justify-center">
                                <i data-lucide="lock" class="text-base text-blue-600"></i>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-xl font-semibold">Presentations in real-time</h4>
                            <p class="text-base font-normal text-gray-500 mt-2">Empower yourself to effectively manage
                                markets with confidence. utilizing strategic insights and resources for success.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature End -->

    <!-- About Start -->
    <section id="about" class="py-20">
        <div class="container">

            <div class="grid lg:grid-cols-2 items-center gap-6">
                <div class="lg:ms-5 ms-8">
                    <div>
                        <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Services</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Get Started In Minutes: Download The App, Create Your Profile</h2>
                    <p class="text-base font-normal text-muted mt-6">Digital payment has revolutionized the way we make
                        financial transactions today With Rible you can enjoy the convenience of making secure &
                        hassle-free payments online. Our platform provides you with a quick and eary.</p>

                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-8 mt-9">

                        <div class="">
                            <div class="flex items-center justify-start">
                                <div class="items-center justify-center flex bg-green-50 rounded-full h-20 w-20 border border-dashed border-green-50">
                                    <i data-lucide="smartphone" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold pt-6">1. Download</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Join the millions already benefitting from.</p>
                        </div>

                        <div class="">
                            <div class="flex items-center justify-start">
                                <div class="items-center justify-center flex bg-red-50 rounded-full h-20 w-20 border border-dashed border-red-50">
                                    <i data-lucide="file-text" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold  pt-6">2. Set Profile</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Join the millions already benefitting from.</p>
                        </div>

                        <div class="">
                            <div class="flex items-center justify-start">
                                <div
                                    class="items-center justify-center flex bg-primary/10 rounded-full h-20 w-20 border border-dashed border-primary/10">
                                    <i data-lucide="rocket" class="h-8 w-8 text-black"></i>
                                </div>
                            </div>
                            <h1 class="text-xl font-semibold pt-6">3. Start</h1>
                            <p class="text-base text-gray-600 font-normal mt-2">Join the millions already benefitting from.</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center">
                    <img src="assets/images/feature-iphone.png" class="h-[600px] rounded-xl mx-auto" alt="feature-image">
                </div>

            </div>
        </div>
    </section>
    <!-- About End -->

    <!-- Pricing Start -->
    <section id="pricing" class="py-20">
        <div class="container">
            <div class="max-w-2xl mx-auto text-center">
                <div>
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Pricing</span>
                </div>
                <h2 class="text-3xl md:text-4xl/tight font-semibold text-black mt-4">Get the power of the professional services with the simple price</h2>
            </div>

            <div class="grid grid-cols-1 mt-8">

                <div id="StarterContent">
                    <div class="mt-14" id="start-month" role="tabpanel" aria-labelledby="start-month-tab">
                        <div class="grid lg:grid-cols-3 grid-cols-1 gap-10">

                            <div class="flex flex-col shadow-2xl rounded-xl bg-white overflow-hidden">
                                <div class="text-center pt-10">
                                    <img src="assets/images/vector/vector-1.png" class="h-28 w-28 mx-auto" alt="email">
                                    <h5 class="text-2xl font-semibold text-black">Standard</h5>
                                    <h2 class="text-5xl mt-5 mb-1 items-center align-middle">
                                        <sup class="text-3xl align-middle">$</sup>
                                        <span data-hs-toggle-count='{
                                            "target": "#toggle-count",
                                            "min": 49,
                                            "max": 199
                                          }' >49</span>
                                    </h2>
                                    <span class="text-base font-medium text-muted">per month</span>
                                </div>

                                <div class="px-5 py-5 mx-auto">
                                    <ul class="text-center">
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">1 Gb Storage</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">3 Domain Names</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">5 FTP Users</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="x" class="text-muted text-lg align-middle me-2"></i>
                                            <h5 class="font-medium text-muted">Free Support</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="x" class="text-muted text-lg align-middle me-2"></i>
                                            <h5 class="font-medium text-muted">Free SSI Certificate</h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex justify-center px-10 pb-10">
                                    <button class="py-2 px-6 inline-flex rounded-md text-base items-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium w-full">Buy Standard</button>
                                </div>
                            </div>

                            <div class="flex flex-col shadow-2xl rounded-xl bg-white overflow-hidden">
                                <div class="text-center pt-10">
                                    <img src="assets/images/vector/vector-2.png" class="h-28 w-28 mx-auto"
                                        alt="vector-2">
                                    <h5 class="text-2xl font-semibold text-black">Premium</h5>
                                    <h2 class="text-5xl mt-5 mb-1 items-center align-middle">
                                        <sup class="text-3xl align-middle">$</sup>
                                        <span data-hs-toggle-count='{
                                            "target": "#toggle-count",
                                            "min": 78,
                                            "max": 299
                                          }' >78</span>
                                    </h2>
                                    <span class="text-base font-medium text-muted">per month</span>
                                </div>

                                <div class="px-5 py-5 mx-auto">
                                    <ul class="text-center text-black">
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">1 Gb Storage</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">3 Domain Names</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">5 FTP Users</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">Free Support</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="x" class="text-muted text-lg align-middle me-2"></i>
                                            <h5 class="font-medium text-muted">Free SSI Certificate</h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex justify-center px-10 pb-10">
                                    <button class="py-2 px-6 inline-flex rounded-md text-base items-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium w-full">Buy Premium</button>
                                </div>
                            </div>

                            <div class="flex flex-col shadow-2xl rounded-xl bg-white overflow-hidden ">
                                <div class="text-center pt-10">
                                    <img src="assets/images/vector/vector-3.png" class="h-28 w-28 mx-auto"
                                        alt="vector-3">
                                    <h5 class="text-2xl font-semibold text-black">Enterprise</h5>
                                    <h2 class="text-5xl mt-5 mb-1 items-center align-middle">
                                        <sup class="text-3xl align-middle">$</sup>
                                        <span data-hs-toggle-count='{
                                            "target": "#toggle-count",
                                            "min": 99,
                                            "max": 399
                                          }' >99</span>
                                    </h2>
                                    <span class="text-base font-medium text-muted">per month</span>
                                </div>

                                <div class="px-5 py-5 mx-auto">
                                    <ul class="text-center text-black">
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">1 Gb Storage</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">3 Domain Names</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">5 FTP Users</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">Free Support</h5>
                                        </li>
                                        <li class="flex items-center justify-start py-2">
                                            <i data-lucide="check" class="text-primary text-lg align-middle me-2"></i>
                                            <h5 class="font-medium">Free SSI Certificate</h5>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex justify-center px-10 pb-10">
                                    <button class="py-2 px-6 inline-flex rounded-md text-base items-center justify-center border border-primary text-white bg-primary hover:bg-primaryDark transition-all duration-500 font-medium w-full">Buy Enterprise</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing End-->

    <!-- Testimonial Start -->
    <section id="testimonial" class="py-20">
        <div class="container">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Our Clients</span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Stories From Our Customers</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 mt-14 items-center">
                <div class="relative">
                    <div class="swiper testi-swiper rounded-md relative px-1">
                        <div class="swiper-wrapper flex justify-between gap-3">
                                <div class="p-6 rounded-xl border border-default-200">
                                    <h3 class="text-xl font-semibold text-default-950">No doubt, spend. in is the best!</h3>
                                    <p class="text-base font-normal mt-4 mb-4 text-muted">
                                        Without a doubt, Spend in stands out as the absolute best.Their exceptional
                                        quality, reliablity, and customer service are unmatched. I have complete....
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <img src="assets/images/user/client-04.jpg" class="h-12 rounded-full"
                                                alt="">
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-primary">Moritika Kazuki</h3>
                                            <p class="text-sm font-medium mt-1">Finance Manager at Mangan</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6 rounded-xl border border-default-200">
                                    <h3 class="text-xl font-semibold text-default-950">It's just incredible!</h3>
                                    <p class="text-base font-normal mt-4 mb-4 text-muted">
                                        I am extremely delighated with the exceptional service provided by NioLand.
                                        Their expert support system, efficient tools, and strategic solutions have
                                        truly....
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <img src="assets/images/user/client-05.jpg" class="h-12 rounded-full"
                                                alt="">
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-primary">Jimmy Bartney</h3>
                                            <p class="text-sm font-medium mt-1">Product Manager At Picko Lab</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6 rounded-xl border border-default-200">
                                    <h3 class="text-xl font-semibold text-default-950">Satisfied user here!</h3>
                                    <p class="text-base font-normal mt-4 mb-4 text-muted">
                                        As a satisfied user, I can confidence say that my experience with NioLand has
                                        been outstanding. The service, support, and solutions provided have...
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <img src="assets/images/user/client-07.jpg" class="h-12 rounded-full"
                                                alt="">
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-primary">Natasha Romanoff</h3>
                                            <p class="text-sm font-medium mt-1">Black Widow</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-6 rounded-xl border border-default-200">
                                    <h3 class="text-xl font-semibold text-default-950">Best service here!</h3>
                                    <p class="text-base font-normal mt-4 mb-4 text-muted">
                                        "I've tried many services, but none compare to the excellence provided here!
                                        From start to finish, the team has been attentive, professional, and committed
                                        to delivering the best results."
                                    </p>
                                    <div class="flex items-center gap-4">
                                        <div>
                                            <img src="assets/images/user/client-03.jpg" class="h-12 rounded-full"
                                                alt="">
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-primary">Barbara McIntosh</h3>
                                            <p class="text-sm font-medium mt-1">Senior Software Developer</p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <section id="blog" class="py-20">
        <div class="container">
            <div class="">
                <div class="text-center max-w-xl mx-auto">
                    <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950">Blog</span>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">Check the latest news about our company in our blog.</h2>
                </div>
            </div>

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 mt-14 items-center">
                <div class="bg-white rounded-xl border">
                    <div class="relative">
                        <img class="rounded-t-xl" src="assets/images/blog/05.jpg" alt="">
                    </div>
                    <div class="flex py-6 px-6">
                        <div>
                            <a href="#" class="text-xl text-black font-semibold line-clamp-2">Spotlight — Equinox Collection by Shane Griffin</a>
                            <p class="mt-4 mb-6 text-gray-500 leading-6">As I searched for inspiration to
                                get started, I came across the captivating creations of Shane Griffin, an artist and
                                director located in New York City...</p>

                            <div class="flex items-center justify-between gap-3 mt-4">
                                <div class="flex items-center">
                                    <img src="assets/images/user/client-05.jpg" class="h-10 w-10 me-4 rounded-full" alt="">
                                    <a href="#" class="text-black text-sm font-semibold pb-1 hover:underline hover:text-primary transition-all duration-300"> Credon catla</a>
                                </div>
                                <p class="flex font-medium text-muted">August 2</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border">
                    <div class="relative">
                        <img class="rounded-t-xl" src="assets/images/blog/07.jpg" alt="">
                    </div>
                    <div class="flex py-6 px-6">
                        <div>
                            <a href="#" class="text-xl text-black font-semibold line-clamp-2">Random Explorations with Cinema 4D and Redshift</a>
                            <p class="mt-4 mb-6 text-gray-500 leading-6">As I searched for inspiration to
                                get started, I came across the captivating creations of Shane Griffin, an artist and
                                director located in New York City...</p>

                            <div class="flex items-center justify-between gap-3 mt-4">
                                <div class="flex items-center">
                                    <img src="assets/images/user/client-03.jpg" class="h-10 w-10 me-4 rounded-full" alt="">
                                    <a href="#" class="text-black text-sm font-semibold pb-1 hover:underline hover:text-primary transition-all duration-300"> Jessica Smith</a>
                                </div>
                                <p class="flex font-medium text-muted">August 3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl border">
                    <div class="relative">
                        <img class="rounded-t-xl" src="assets/images/blog/04.jpg" alt="">
                    </div>
                    <div class="flex py-6 px-6">
                        <div>
                            <a href="#" class="text-xl text-black font-semibold line-clamp-2">Step by step guide for conducting usability</a>
                            <p class="mt-4 mb-6 text-gray-500 leading-6">As I searched for inspiration to
                                get started, I came across the captivating creations of Shane Griffin, an artist and
                                director located in New York City...</p>

                            <div class="flex items-center justify-between gap-3 mt-4">
                                <div class="flex items-center">
                                    <img src="assets/images/user/client-03.jpg" class="h-10 w-10 me-4 rounded-full" alt="">
                                    <a href="#" class="text-black text-sm font-semibold pb-1 hover:underline hover:text-primary transition-all duration-300"> Petric Camp</a>
                                </div>
                                <p class="flex font-medium text-muted">August 8</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog End -->

    <!-- Contact Start -->
    <section id="contact" class="py-20 bg-gray-50">
        <div class="container">
            <div class="grid lg:grid-cols-3 gap-6 items-center">
                <div>
                    <div>
                        <span class="text-sm text-primary uppercase font-semibold tracking-wider text-default-950 mb-6">Contact Us</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl/tight font-semibold mt-4">We're open to talk to good people.</h2>

                    <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10">
                        <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <i data-lucide="map-pin" class="text-2xl text-primary"></i>
                        </div>
                        <div>
                            <h5 class="text-base text-muted font-medium mb-1">123 King Street, London W60 10250</h5>
                            <a href="#" class="text-xs text-primary font-bold uppercase">See more</a>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10">
                        <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <i data-lucide="mail" class="text-2xl text-primary"></i>
                        </div>
                        <div>
                            <h5 class="text-base text-muted font-medium mb-1">support@willbesent.com</h5>
                            <a href="#" class="text-xs text-primary font-bold uppercase">Say hello</a>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-start mt-10">
                        <div class="h-12 w-12 rounded-full bg-primary/10 flex items-center justify-center">
                            <i data-lucide="smartphone" class="text-2xl text-primary"></i>
                        </div>
                        <div>
                            <h5 class="text-base text-muted font-medium mb-1">(+01) 1234 5678 00</h5>
                            <a href="#" class="text-xs text-primary font-bold uppercase">call now</a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 lg:ms-24">
                    <div class="p-6 md:p-12 rounded-md shadow-lg bg-white">
                        <form>
                            <div class="grid sm:grid-cols-2 gap-6">
                                <div>
                                    <label for="formFirstName" class="block text-sm/normal font-semibold text-black mb-2">First Name</label>
                                    <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formFirstName" placeholder="Your first name..." required="">
                                </div>

                                <div>
                                    <label for="formLastName" class="block text-sm/normal font-semibold text-black mb-2">Last Name</label>
                                    <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formLastName" placeholder="Last first name..." required="">
                                </div>

                                <div>
                                    <label for="formEmail" class="block text-sm/normal font-semibold text-black mb-2">Email Address</label>
                                    <input type="email" class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formEmail" placeholder="Your email..." required="">
                                </div>

                                <div>
                                    <label for="formPhone" class="block text-sm/normal font-semibold text-black mb-2">Phone Number</label>
                                    <input type="text" class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formPhone" placeholder="Type phone number..." required="">
                                </div>

                                <div class="sm:col-span-2">
                                    <div class="mb-4">
                                        <label for="formMessages" class="block text-sm/normal font-semibold text-black mb-2">Messages</label>
                                        <textarea class="block w-full text-sm rounded-md py-3 px-4 border-gray-200 focus:border-gray-300 focus:ring-transparent" id="formMessages" rows="4" placeholder="Type messages..." required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="py-2 px-6 rounded-md text-base items-center justify-center border border-primary bg-primary hover:bg-primaryDark transition-all duration-500 font-medium">Send Messages <i class="mdi mdi-send ms-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->

    <!-- Footer Start -->
    <footer class="bg-[#17243A]">
        <div class="container">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 pb-16 pt-16">
                <div class="col-span-full lg:col-span-2">
                    <div class="max-w-2xl mx-auto">
                        <div class="flex items-center">
                            <img src="assets/images/logo.png" alt="" class="h-10 me-5">
                        </div>
                        <p class="text-gray-300 max-w-xs mt-6">This may include the company's address, phone number, email address, and links to social media profiles.</p>
                    </div>

                    <div class="mt-6 grid space-y-3">
                        <a class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            Info@willbesent.com
                        </a>

                        <a class="inline-flex items-center gap-x-4 text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            (888) 253 145 148
                        </a>
                    </div>
                </div>

                <div class="col-span-1">
                    <h4 class="font-semibold text-gray-100 uppercase">Company</h4>

                    <div class="mt-6 grid space-y-3">
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">About</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Services</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Portfolio</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Blog</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Contact</a></p>
                    </div>
                </div>

                <div class="col-span-1">
                    <h4 class="font-semibold text-gray-100 uppercase">Product</h4>

                    <div class="mt-6 grid space-y-3">
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Services</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">About Us</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">News & Stories</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Roadmap</a></p>
                    </div>
                </div>

                <div class="col-span-1">
                    <h4 class="font-semibold text-gray-100 uppercase">Important Links</h4>

                    <div class="mt-6 grid space-y-3">
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Our Journeys</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Roadmap</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Pricing Plans</a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Privacy Policy </a></p>
                        <p><a class="inline-flex gap-x-2 text-base text-gray-300 hover:text-gray-400 transition-all duration-300" href="#">Terms & Conditions</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4 bg-[#1C2940]">
            <!-- 1B283F -->
            <div class="container">
                <div class="flex justify-between items-center">
                    <p class="text-base text-white"><script>document.write(new Date().getFullYear())</script>© WBS - <a href="#">willbesent.com</a></p>

                    <div>
                        <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent text-white hover:bg-primary transition-all duration-300" href="#">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>
                        <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent text-white hover:bg-primary transition-all duration-300" href="#">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                            </svg>
                        </a>
                        <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent text-white hover:bg-primary transition-all duration-300" href="#">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                            </svg>
                        </a>
                        <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent text-white hover:bg-primary transition-all duration-300" href="#">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                            </svg>
                        </a>
                        <a class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent text-white hover:bg-primary transition-all duration-300" href="#">
                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.362 10.11c0 .926-.756 1.681-1.681 1.681S0 11.036 0 10.111C0 9.186.756 8.43 1.68 8.43h1.682v1.68zm.846 0c0-.924.756-1.68 1.681-1.68s1.681.756 1.681 1.68v4.21c0 .924-.756 1.68-1.68 1.68a1.685 1.685 0 0 1-1.682-1.68v-4.21zM5.89 3.362c-.926 0-1.682-.756-1.682-1.681S4.964 0 5.89 0s1.68.756 1.68 1.68v1.682H5.89zm0 .846c.924 0 1.68.756 1.68 1.681S6.814 7.57 5.89 7.57H1.68C.757 7.57 0 6.814 0 5.89c0-.926.756-1.682 1.68-1.682h4.21zm6.749 1.682c0-.926.755-1.682 1.68-1.682.925 0 1.681.756 1.681 1.681s-.756 1.681-1.68 1.681h-1.681V5.89zm-.848 0c0 .924-.755 1.68-1.68 1.68A1.685 1.685 0 0 1 8.43 5.89V1.68C8.43.757 9.186 0 10.11 0c.926 0 1.681.756 1.681 1.68v4.21zm-1.681 6.748c.926 0 1.682.756 1.682 1.681S11.036 16 10.11 16s-1.681-.756-1.681-1.68v-1.682h1.68zm0-.847c-.924 0-1.68-.755-1.68-1.68 0-.925.756-1.681 1.68-1.681h4.21c.924 0 1.68.756 1.68 1.68 0 .926-.756 1.681-1.68 1.681h-4.21z"/>
                            </svg>
                        </a>
                    </div>
                </div>


            </div>
        </div>

    </footer>
    <!-- Footer End -->


    <!-- Preline Js -->
    <script src="assets/libs/preline/preline.js" ></script>

    <!-- Lucide Js -->
    <script src="assets/libs/lucide/umd/lucide.min.js"></script>

    <!-- Gumshoe Js -->
    <script src="assets/libs/gumshoejs/gumshoe.polyfills.min.js"></script>

    <!-- Jarallax Js -->
    <script src="assets/libs/jarallax/jarallax.min.js"></script>

    <!-- Swiper Bundle Js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Js -->
    <script src="assets/js/swiper.js"></script>

    <!-- Main App Js -->
    <script src="assets/js/app.js" ></script>

    </body>
</html>
