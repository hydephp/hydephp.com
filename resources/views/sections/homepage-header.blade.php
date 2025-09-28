<div class="relative items-center justify-center w-screen min-h-screen">
    <div class="pt-36 md:pt-64 container self-center my-auto flex flex-col items-center justify-center h-full max-w-6xl pl-0 mx-auto -mt-24 sm:pl-8 xl:pl-0 md:flex-row md:justify-between">
        <div class="flex flex-col items-center w-5/6 md:items-start sm:w-1/2 lg:w-3/5 lg:-mt-4">
            <div class="relative md:text-left text-center">
                <h1 class="relative mb-4 text-4xl font-black leading-none text-center text-black lg:text-5xl xl:text-6xl md:text-left">
                    HydePHP
                </h1>
                <small class="relative mb-4  text-xl font-black leading-none  text-black lg:text-2xl xl:text-3xl md:text-left text-center">
                    The Static Site Generator You've Been Waiting For, is here.
                </small>
                <img class="absolute top-0 right-0 hidden w-20 -mt-16 mr-48 transform rotate-45 lg:block xl:mr-48 xl:-mt-14" style="transform: rotate(35deg)" src="{{ Asset::mediaLink('logo.svg') }}" alt="HydePHP Logo">
            </div>
            <p class="my-3 text-base text-center text-gray-600 xl:text-xl md:text-left ">
                Create websites, blogs, documentation sites, and more, with the power of Laravel and the simplicity of Markdown.
                Your next website is minutes away from becoming a reality.
            </p>
            <a href="{{ DocumentationPage::home() }}" class="relative mt-5 group">
                <span class="absolute top-0 left-0 w-full h-full mt-1 ml-1 bg-black rounded group-hover:m-0"></span>
                <span class="relative inline-block w-full h-full px-8 py-3 text-base font-bold bg-white border-2 border-black rounded group-hover:bg-violet-400 xl:text-xl fold-bold">
                To the Documentation!
            </span>
            </a>
        </div>
        <div class="flex flex-col items-end justify-center w-5/6 h-auto pl-0 pr-0 mt-16 mb-12 sm:pl-20 sm:pr-8 xl:pr-0 md:mt-0 md:h-full sm:w-2/3 lg:-mt-4">
            <img src="{{ Asset::mediaLink('header.png') }}" alt="Two developers collaboratively working on a static site displayed on a large monitor, illustrating the ease of website creation with HydePHP.">
        </div>
    </div>
    <svg class="absolute bottom-0 w-screen text-violet-300 fill-current" viewBox="0 0 1400 50" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 0c309.151 33.333 542.484 50 700 50 157.516 0 390.849-16.667 700-50v50H0V0z"/>
    </svg>
</div>