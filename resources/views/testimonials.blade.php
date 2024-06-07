<section id="testimonials"
         class="flex items-center justify-center w-full px-8 pt-10 md:pt-16 lg:pt-24 xl:pt-40  xl:px-0">
    <div class="max-w-6xl mx-auto">
        <div class="flex-col items-center ">
            <div class="flex flex-col items-center justify-center w-full h-full max-w-2xl pr-8 mx-auto text-center">
                <p class="my-5 text-base font-medium tracking-tight text-indigo-500 uppercase">
                </p>
                <h2 class="text-4xl font-extrabold leading-10 tracking-tight text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">
                    Testimonials
                </h2>
                <p class="my-6 text-xl font-medium text-gray-500">
                    We are proud to hear that so many people use Hyde to build their websites.
                    Here are some of our favourite mentions.
                </p>
            </div>
            <div class="flex flex-col items-center justify-center max-w-2xl py-8 mx-auto xl:flex-row xl:max-w-full">
                @php /** @var \Hyde\Markdown\Models\MarkdownDocument $testimonial */ @endphp
                @foreach(\Hyde\Support\DataCollections::markdown('testimonials') as $file => $testimonial)
                    <div class="w-full xl:w-1/2 xl:pr-8">
                        <blockquote class="my-4 flex flex-col-reverse items-center justify-between w-full col-span-1 p-6 text-center transition-all duration-200 bg-gray-100 rounded-lg md:flex-row md:text-left hover:bg-gray-50 hover:shadow ease">
                            <div class="flex flex-col sm:pr-8">
                                <div class="relative sm:pl-12">
                                    <svg class="hidden sm:block absolute left-0 w-10 h-10 text-indigo-500 fill-current"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                                        <path
                                                d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z"/>
                                    </svg>
                                    <p class="mt-2 text-base text-gray-600 prose">
                                        {!! $testimonial->markdown !!}
                                    </p>
                                </div>
                                <h3 class="pl-12 mt-3 text-base font-medium leading-5 text-gray-800">
                                    @if($testimonial->matter('twitter_username'))
                                        <a href="https://twitter.com/{{ $testimonial->matter('twitter_username') }}" rel="author nofollow">
                                            {{ '@' . $testimonial->matter('twitter_username') }}
                                        </a>
                                    @else
                                        {{ $testimonial->matter('name') }}
                                    @endif
                                    <span class="mt-1 text-sm leading-5 text-gray-500">
                                        - <a href="{{ $testimonial->matter('twitter_link') }}" class="text-indigo-500" rel="nofollow">
                                            Via Twitter
                                        </a>
                                    </span>
                                </h3>
                            </div>
                            <img class="flex-shrink-0 object-cover w-24 h-24 mb-5 bg-gray-300 rounded-full md:mb-0"
                                 onerror="this.onerror=null; this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';"
                                 src="{{ $testimonial->matter('profile_image') ?? 'https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png' }}"
                                 alt="Profile image">
                        </blockquote>
                    </div>
                @endforeach
            </div>
            <footer class="text-center opacity-75">
                <small>Testimonials may be edited for formatting, spelling, and brevity, but never content.</small>
                <small>Want your own testimonial here? Want to remove yours? This
                    <a class="text-indigo-700" href="https://github.com/hydephp/hydephp.com/blob/master/_pages/index.blade.php">page is open source</a>.</small>
            </footer>
        </div>
    </div>
</section>