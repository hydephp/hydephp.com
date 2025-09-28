<!-- Latest Posts Section -->
<section id="posts" class="relative w-full py-16 sm:py-20 lg:py-24 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 bg-grid-white/[0.02] bg-[size:60px_60px]"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/20 via-transparent to-purple-900/20"></div>

    <div class="container relative z-10 max-w-7xl px-4 sm:px-8 mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center px-4 py-2 mb-6 text-sm font-medium text-blue-300 bg-blue-500/10 border border-blue-500/20 rounded-full backdrop-blur-sm">
                <span class="mr-2">📝</span>
                From the Blog
            </div>
            
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Latest
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-400">
                    Posts
                </span>
            </h2>
            
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Here are the latest posts from the Hyde Blog, fully created using Hyde, of course.
                Discover tips, tutorials, and insights from the community.
            </p>
        </div>

        <!-- Enhanced Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @foreach(MarkdownPost::getLatestPosts()->where(fn ($post) => $post->matter('hiddenFromHomepage') !== true)->take(3) as $post)
                <article class="group relative">
                    <!-- Glow effect -->
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-2xl blur opacity-0 group-hover:opacity-20 transition duration-1000"></div>
                    
                    <!-- Post Card -->
                    <div class="relative h-full bg-slate-800/80 backdrop-blur-sm border border-slate-700/50 rounded-2xl overflow-hidden hover:border-blue-500/30 transition-all duration-300 hover:-translate-y-1">
                        
                        @if($post->image)
                            <!-- Featured Image -->
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ $post->image }}" 
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-800/80 via-transparent to-transparent"></div>
                            </div>
                        @endif

                        <!-- Post Content -->
                        <div class="p-8 {{ $post->image ? '' : 'pt-12' }}">
                            <!-- Category/Date Badge -->
                            <div class="flex items-center justify-between mb-4">
                                @if($post->category)
                                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium text-blue-300 bg-blue-500/10 border border-blue-500/20 rounded-full">
                                        {{ ucfirst($post->category) }}
                                    </span>
                                @endif
                                
                                @if($post->date)
                                    <time class="text-sm text-gray-400" datetime="{{ $post->date }}">
                                        {{ $post->date }}
                                    </time>
                                @endif
                            </div>

                            <!-- Post Title -->
                            <h3 class="text-xl font-bold text-white mb-3 group-hover:text-blue-300 transition-colors line-clamp-2">
                                <a href="{{ $post->getCanonicalUrl() }}" class="hover:no-underline">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <!-- Post Description -->
                            @if($post->description)
                                <p class="text-gray-300 mb-6 line-clamp-3 leading-relaxed">
                                    {{ $post->description }}
                                </p>
                            @endif

                            <!-- Read More Link -->
                            <div class="flex items-center justify-between">
                                <a href="{{ $post->getCanonicalUrl() }}" 
                                   class="inline-flex items-center text-blue-400 hover:text-blue-300 font-medium transition-colors group/link">
                                    Read more
                                    <svg class="ml-2 w-4 h-4 group-hover/link:translate-x-1 transition-transform" 
                                         fill="none" 
                                         viewBox="0 0 24 24" 
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>

                                @if($post->author)
                                    <div class="flex items-center text-sm text-gray-400">
                                        <span class="mr-2">👤</span>
                                        {{ $post->author }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="inline-flex flex-col sm:flex-row items-center gap-6 bg-slate-800/60 backdrop-blur-sm border border-slate-700/50 rounded-2xl p-8">
                <div class="text-center sm:text-left">
                    <h3 class="text-xl font-bold text-white mb-2">
                        Want to read more?
                    </h3>
                    <p class="text-gray-300">
                        Explore our complete collection of articles, tutorials, and insights.
                    </p>
                </div>
                
                <a href="posts" 
                   class="flex-shrink-0 group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-300"></div>
                    <span class="relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white bg-slate-900 border border-transparent rounded-lg group-hover:bg-slate-800 transition-colors">
                        <span class="mr-2">📚</span>
                        View All Posts
                    </span>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Wave transition -->
    <svg class="absolute bottom-0 w-full text-gray-100 fill-current" viewBox="0 0 1400 74" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 24C87.243 11.422 173.12 5.133 257.633 5.133 468.305 5.133 578.027 74 700 74c136.015 0 290.882-96.208 481.234-68.867C1268.807 17.71 1341.73 24 1400 24v50H0V24z" />
    </svg>
</section>