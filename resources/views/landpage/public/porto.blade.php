<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dist/css/final.css">
    <title>Document</title>
</head>

<body>
    <style>
        .hide-scroll-bar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .hide-scroll-bar::-webkit-scrollbar {
            display: none;
        }
    </style>
    <!-- Header Start -->
    <header class="absolute top-0 left-0 z-10 flex w-full items-center bg-transparent">
        <div class="container">
            <div class="relative flex items-center justify-between">
                <div class="mt-1 px-4">
                    <a href="../index.html" class="h-10 w-16 py-6">
                        <img src="../dist/img/logo 1.png" alt="" />
                    </a>
                </div>
                <div class="flex items-center px-4">

                    <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
                      <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                      <span class="hamburger-line transition duration-300 ease-in-out"></span>
                      <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                    </button>

                    <nav id="nav-menu" class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:bg-dark dark:shadow-slate-500 lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none lg:dark:bg-transparent">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="../index.html" class="mx-2 flex py-2 text-sm items-center bg-transparent text-white tracking-widest"><span class="relative pr-5 pb-1 text-white after:transition-transform after:duration-500 after:ease-out after:absolute after:bottom-0 after:left-0 after:block after:h-[1px] after:w-11 after:origin-bottom-right after:scale-x-0 after:bg-white after:content-[''] after:group-hover:origin-bottom-left after:group-hover:scale-x-100">Home</span></a
                  >
                </li>
                <li class="group">
                  <a
                    href="/land#home"
                    class="mx-2 flex py-2 text-sm items-center bg-transparent text-white tracking-widest"
                    ><span class="relative pr-5 pb-1 text-white after:transition-transform after:duration-500 after:ease-out after:absolute after:bottom-0 after:left-0 after:block after:h-[1px] after:w-12 after:origin-bottom-right after:scale-x-0 after:bg-white after:content-[''] after:group-hover:origin-bottom-left after:group-hover:scale-x-100">About</span></a
                  >
                </li>
                <li class="group">
                  <a
                    href="/land#about"
                    class="mx-2 flex py-2 text-sm items-center bg-transparent text-white tracking-widest"
                    ><span class="relative pr-5 pb-1 text-white after:transition-transform after:duration-500 after:ease-out after:absolute after:bottom-0 after:left-0 after:block after:h-[1px] after:w-14 after:origin-bottom-right after:scale-x-0 after:bg-white after:content-[''] after:group-hover:origin-bottom-left after:group-hover:scale-x-100">Service</span></a
                  >
                </li>
                <li class="group">
                  <a
                    href="/land#clients"
                    class="mx-2 flex py-2 text-sm items-center bg-transparent text-white tracking-widest"
                    ><span class="relative pr-5 pb-1 text-white after:transition-transform after:duration-500 after:ease-out after:absolute after:bottom-0 after:left-0 after:block after:h-[1px] after:w-[168px] after:origin-bottom-right after:scale-x-0 after:bg-white after:content-[''] after:group-hover:origin-bottom-left after:group-hover:scale-x-100">Customers & Partners</span></a
                  >
                </li>
                <li class="group">
                  <a
                    href="/land#timeline"
                    class="mx-2 flex py-2 text-sm items-center bg-transparent text-white tracking-widest"
                    ><span class="relative pr-5 pb-1 text-white after:transition-transform after:duration-500 after:ease-out after:absolute after:bottom-0 after:left-0 after:block after:h-[1px] after:w-[90px] after:origin-bottom-right after:scale-x-0 after:bg-white after:content-[''] after:group-hover:origin-bottom-left after:group-hover:scale-x-100">Our Journey</span></a
                  >
                </li>
                <li class="group">
                  <a
                    href="/land#portofolio"
                    class="mx-2 flex py-2 text-sm items-center bg-transparent text-white tracking-widest"
                    ><span class="relative pr-5 pb-1 text-white after:transition-transform after:duration-500 after:ease-out after:absolute after:bottom-0 after:left-0 after:block after:h-[1px] after:w-[76px] after:origin-bottom-right after:scale-x-0 after:bg-white after:content-[''] after:group-hover:origin-bottom-left after:group-hover:scale-x-100">Portofolio</span></a
                  >
                </li>
                <li class="group">
                  <a
                    href="/land#contact"
                    class="mx-2 flex py-2 text-sm items-center bg-transparent text-white tracking-widest"
                    ><span class="relative pr-5 pb-1 text-white after:transition-transform after:duration-500 after:ease-out after:absolute after:bottom-0 after:left-0 after:block after:h-[1px] after:w-[60px] after:origin-bottom-right after:scale-x-0 after:bg-white after:content-[''] after:group-hover:origin-bottom-left after:group-hover:scale-x-100">Contact</span></a
                  >
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->
    <!-- home Section Start -->
    <section id="Portofolio" class=" pt-20 pb-20  bg-dark">
      <div class="container">
        <div class="w-full px-4">
          <div class="mx-auto mb-12 max-w-xl text-center">
            <h2
              class="mb-2 text-3xl font-bold text-white md:w-full md:text-5xl lg:w-full"
            >
              Our <span class="text-merah">Footsteps</span> Lead Us <span class="text-merah"> to Success </span>
            </h2>
             
          </div>
          </div>
        </div>
                            <div class="flex w-full flex-wrap justify-center gap-6 md:gap-1 lg:gap-10 px-4 xl:mx-auto xl:w-full">
                              @foreach ($portos as $porto)
                              <a href="/portofolio/{{ $porto->id }}">
                              <div class="mb-2 w-80 h-full bg-birutua rounded-lg md:w-[386PX] md:h-full lg::w-1/3">
                                <div class="overflow-hidden rounded-md shadow-md">
                                  <img class="w-64 h-48 md:w-96 md:h-64"src="{{ asset('storage/' . $porto->cover) }}"alt="Landing Page"width="w-full"/>
                                </div>
                                <div class="w-full h-20 p-5 justify-center text-center items-center">
                                      <h2 class="text-center text-white text-base font-semibold">{{ $porto->project_name }}</h2>
                                      <p class="text-center text-neutral-300 text-sm font-medium">{{ $porto->service }}</p>
                                    </div>
                                  </div>
                                </a>
                                @endforeach 
                </div>
            </div>
            </section>
            <!-- Footer Start -->
            <footer class="bg-birutua pt-20 pb-0 px-4 md:px-12 lg:px-24">
                <div class="container">
                    <div class="flex flex-wrap">
                        <div class="mb-10 w-full  font-medium text-abumuda md:w-1/2">
                            <img class="mb-2" src="./dist/img/logo 1.png" alt="">
                            <div class=" mb-4">
                                <h3 class="mb-2 text-sm font-semibold">PT Rapier Technology International</h3>
                                <p>Rapier Tangerang</p>
                                <p>Jl. Iskandar Muda No.8, Neglasari, Kec. Neglasari, Kota Tangerang, Banten 15129 Indonesia</p>
                            </div>
                            <div class="">
                                <p>Rapier Semarang</p>
                                <p>Jl. Mulawarman Selatan Raya No.16, Kramas, Kec. Tembalang, Kota Semarang, Jawa Tengah 50278 Indonesia</p>
                            </div>
                        </div>
                        <div class="mt-11 text-abumuda w-full px-4 md:w-1/2">
                            <div class="">
                                <H2 class="mb-2 text-sm font-semibold">Social Media</H2>
                                <div class="w-full ">
                                    <div class="mb-4 flex items-start justify-start">
                                        <!-- TikTok -->
                                        <a href="https://www.tiktok.com/@rapiertechnology?is_from_webapp=1&sender_device=pc" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-md border border-slate-300 text-slate-300 hover:border-dark hover:bg-dark hover:text-white">
                                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>TikTok</title>
                <path
                  d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"
                />
              </svg>
                                        </a>

                                        <!-- Instagram -->
                                        <a href="https://www.instagram.com/rapiertechnology/" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-md border   text-slate-300 hover:border-dark hover:bg-dark hover:text-white">
                                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Instagram</title>
                <path
                  d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"
                />
              </svg>
                                        </a>

                                        <!-- Youtube -->
                                        <a href="https://www.youtube.com/channel/UCDm0RwY3cE36DuXzZTHz1Zg" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-md border   text-slate-300 hover:border-dark hover:bg-dark hover:text-white">
                                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>YouTube</title>
                <path
                  d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"
                />
              </svg>
                                        </a>

                                        <!-- LinkedIn -->
                                        <a href="https://www.linkedin.com/company/rapitechindonesia/mycompany/" target="_blank" class="mr-3 flex h-9 w-9 items-center justify-center rounded-md border   text-slate-300 hover:border-dark hover:bg-dark hover:text-white">
                                            <svg role="img" width="20" class="fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>LinkedIn</title>
                <path
                  d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"
                />
              </svg>
                                        </a>
                                    </div>

                                </div>
                                <p class="  text-xs font-normal">Created By ❤ Team Rapier<br/>Created UIcons By 🙏 Flaticon</p>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
            <!-- Footer End -->
            <!-- home Section End -->
            <script src="../dist/js/script.js"></script>
</body>

</html>