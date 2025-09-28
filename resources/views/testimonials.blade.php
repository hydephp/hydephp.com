<!-- Testimonials Section -->
<section id="testimonials" class="relative w-full py-16 sm:py-20 lg:py-24 bg-gradient-to-br from-gray-50 to-white overflow-hidden">
    <!-- Subtle background pattern -->
    <div class="absolute inset-0 bg-grid-gray-100/30 bg-[size:60px_60px]"></div>
    
    <div class="container relative z-10 max-w-7xl px-4 sm:px-8 mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-4 py-2 mb-6 text-sm font-medium text-purple-600 bg-purple-50 border border-purple-200 rounded-full">
                <span class="mr-2">💬</span>
                Community Love
            </div>
            
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                What People Are
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-pink-600">
                    Saying
                </span>
            </h2>
            
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                We are proud to hear that so many people use Hyde to build their websites.
                Here are some of our favourite mentions from the community.
            </p>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-16">
            @php
                $testimonials = \App\Extend\DataCollections::markdown('testimonials');

                // Sort by Markdown length
                $testimonials = $testimonials->sortByDesc(function (\App\DataCollections\Types\Testimonials $testimonial) {
                    return strlen($testimonial->markdown->body());
                });
            @endphp
            @php /** @var \App\DataCollections\Types\Testimonials $testimonial */ @endphp
            @foreach($testimonials as $file => $testimonial)
                @continue($file === 'testimonials/README.md')
                <div class="group relative">
                    <!-- Glow effect -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-600 via-pink-600 to-blue-600 rounded-2xl blur opacity-0 group-hover:opacity-10 transition duration-1000"></div>
                    
                    <!-- Testimonial Card -->
                    <blockquote class="relative bg-white/80 backdrop-blur-sm border border-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 h-full flex flex-col">
                        <!-- Quote Icon -->
                        <div class="absolute -top-4 -left-4 w-8 h-8 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 100 125">
                                <path d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z"/>
                            </svg>
                        </div>

                        <!-- Testimonial Content -->
                        <div class="flex-1 mb-6">
                            <div class="prose prose-gray max-w-none">
                                {!! $testimonial->markdown->compile() !!}
                            </div>
                        </div>

                        <!-- Author Section -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                @if($testimonial->profile_image)
                                    <img class="w-12 h-12 rounded-full object-cover bg-gray-200 mr-4 ring-2 ring-purple-100" 
                                         onerror="this.onerror=null; this.src='https://cdn.jsdelivr.net/gh/hydephp/cdn-static@master/avatar.png';"
                                         src="{{ $testimonial->profile_image }}"
                                         alt="Profile image">
                                @endif
                                
                                <div>
                                    <h3 class="text-base font-semibold text-gray-900">
                                        @if($testimonial->twitter_username)
                                            <a href="https://twitter.com/{{ $testimonial->twitter_username }}" 
                                               class="hover:text-purple-600 transition-colors" 
                                               rel="author nofollow">
                                                {{ '@' . $testimonial->twitter_username }}
                                            </a>
                                        @else
                                            {{ $testimonial->name }}
                                        @endif
                                    </h3>
                                    
                                    <div class="text-sm text-gray-500">
                                        @if($testimonial->title)
                                            {{ $testimonial->title }}
                                            @if($testimonial->company)
                                                <span class="mx-1">at</span>
                                            @endif
                                        @endif
                                        
                                        @if($testimonial->company)
                                            @if($testimonial->company_url)
                                                <a href="{{ $testimonial->company_url }}?ref=HydePHP.com" 
                                                   class="text-purple-600 hover:text-purple-700 font-medium" 
                                                   rel="nofollow">
                                                    {{ $testimonial->company }}
                                                </a>
                                            @else
                                                <span class="font-medium">{{ $testimonial->company }}</span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                            @if($testimonial->twitter_link)
                                <a href="{{ $testimonial->twitter_link }}" 
                                   class="text-gray-400 hover:text-purple-600 transition-colors" 
                                   rel="nofollow"
                                   title="View on Twitter">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </blockquote>
                </div>
            @endforeach
        </div>

        <!-- Call to Action Footer -->
        <div class="text-center">
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-2xl p-8 mb-8">
                <h3 class="text-xl font-bold text-gray-900 mb-4">
                    Share Your Experience
                </h3>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                    Want to have your mention here? Send a Tweet at 
                    <a href="https://twitter.com/HydeFramework" class="text-purple-600 hover:text-purple-700 font-medium">@HydeFramework</a>, 
                    and/or use the hashtag 
                    <a href="https://twitter.com/hashtag/HydePHP" class="text-purple-600 hover:text-purple-700 font-medium">#HydePHP</a>!
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://twitter.com/intent/tweet?text=Just%20built%20my%20website%20with%20%23HydePHP%20and%20I%20love%20it!%20%40HydeFramework" 
                       target="_blank"
                       rel="nofollow"
                       class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 rounded-lg transition-all duration-200 hover:scale-105">
                        <span class="mr-2">🐦</span>
                        Tweet About Hyde
                    </a>
                    
                    <a href="https://github.com/hydephp/hydephp.com/blob/master/_pages/index.blade.php" 
                       class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-purple-700 bg-white border border-purple-200 hover:bg-purple-50 rounded-lg transition-all duration-200">
                        <span class="mr-2">⚡</span>
                        Edit This Page
                    </a>
                </div>
            </div>
            
            <p class="text-sm text-gray-500">
                Testimonials may be edited for formatting, spelling, and brevity, but never content.
            </p>
        </div>
    </div>
</section>
