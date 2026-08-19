---
title: "The Tale of Zoe: From Doodler to Best-Seller with HydePHP"
description: "Once upon a time, in a land filled with pixels and code, there lived a young artist named Zoe. Zoe was a doodler—her sketchbooks brimmed with whimsical characters, enchanting landscapes, and magical creatures. Follow Zoe’s journey from doodler to best-selling artist with the help of HydePHP."
category: tutorial
author:
    name: "Luca Visciola"
    website: "https://hydephp.melasistema.com"
    socials:
        linkedin: "luca-visciola"
        github: "melasistema"
date: "2025-01-11 22:02"
guest_post: true
canonical_guest_post_url: "https://hydephp.melasistema.com/posts/the-tale-of-zoe-from-doodler-to-best-seller-with-hyde-php.html"
image: "https://hydephp.melasistema.com/media/posts/the-tale-of-zoe-featured-image.png"
---

### Prologue

**HydePHP** is more than just a static site generator; it’s a magical tool that empowers developers and creators to bring their visions to life. Designed by the talented **Emma De Silva**, HydePHP is a treasure trove for PHP and Laravel enthusiasts, offering an intuitive way to build stunning functional websites and much more. Inspired by its possibilities, I crafted a tutorial that dives deep into using HydePHP, coupled with my custom Composer package, the **HydePHP Layouts Manager**, which try to simplifies the management of layouts and reusable components within HydePHP projects.

The tutorial, originally published on my blog, takes a creative twist by telling **_The Tale of Zoe: an artist with a dream to turn her doodles into a best-selling brand._** Through her hypothetical story, I demonstrate how anyone can build a captivating website with **HydePHP** featuring a hero section, an engaging FAQ accordion, and an interactive carousel, all designed to promote Zoe’s fictional book—a scenario that resonates with many aspiring artists.

Now reposted here on the **Official HydePHP Blog**, this guide not only highlights the ease and joy of working with **HydePHP** but also serves as a hands-on case study for exploring its features and extending its capabilities with the HydePHP Layouts Manager.

Let Zoe’s enchanting journey inspire you as we unlock the magic of static site generation, one line of code at a time.

---

# The Tale of Zoe: From Doodler to Best-Seller with HydePHP

Once upon a time, in a land filled with pixels and code, there lived a young artist named Zoe. Zoe was a doodler—her sketchbooks brimmed with whimsical characters, enchanting landscapes, and magical creatures. Yet, Zoe had a dream: to turn her passion for art into a radiant online presence, where her designs could inspire people from all corners of the kingdom.

Whispers of a wondrous creation reached far and wide—a magical place where Zoe’s dreams had taken shape. A glowing beacon, they called it:

🌟 [Zoe’s Magical Website](https://hydewizard.melasistema.com).

🃏 [Hyde Wizard’s GitHub Repo](https://github.com/melasistema/hyde-wizard)

But Zoe wasn’t sure how to make her dream come true. She had heard whispers of magical tools—arcane artifacts like **Composer**, the fabled package manager, and **Node.js**, the spellbook of modern web enchantments. These tools, they said, were the key to unlocking a powerful force known as **[HydePHP](https://hydephp.com)** and its enchanting ally, the **[HydePHP Layouts Manager](https://github.com/melasistema/hydephp-layouts-manager/releases/tag/0.2.0)**.

These tales also spoke of a mysterious guide known as the PHP Shaman, a being of both wisdom and power who walked the delicate thread between the tangible and the ethereal.

One day, as Zoe wandered through the dense and tangled Forest of Code, she stumbled upon a clearing bathed in soft, glowing light. There, standing amidst the swirling lines of logic and dreamlike patterns, was the Shaman of Code—the Hyde Wizard. Draped in a cloak that seemed woven from strands of light and shadow, the wizard’s silhouette was crowned by a pointed hat that shimmered with the symbols of forgotten scripts and timeless spells. The wizard radiated an aura of unity, as though the dual forces of science and magic were not opposites but two sides of the same coin.

----------

### Step 1: The First Spell – Creating Zoe’s Magical Website

He chanted the incantation, and with a wave of his hand, Zoe had installed [HydePHP](https://hydephp.com/), which gave her the ability to craft a website with ease. [HydePHP](https://hydephp.com/) would help her create a platform for her doodles, designs, and stories—just like magic!

Zoe quickly followed the wizard’s guidance and, with a few commands, created the foundation for her site:

```bash
composer create-project hyde/hyde zoe-books
cd zoe-books
```

As the foundation materialized on the screen, the Hyde Wizard clapped his hands in delight. “Ah, but what is a magical website without a proclamation to the world? A new adventure must always start with an announcement!” He spun around dramatically, pointing his wand at Zoe’s screen.

“Let us craft your first blog post to declare your arrival!”

Zoe, catching on to the wizard’s enthusiasm, asked, “What should I say?”

The wizard grinned. “Why, tell them of the magic you bring! Something enchanting, like:  
‘A Magical Doodly Website is Finally Here!’”

With the wizard’s help, Zoe created her first blog post, typing out the command with excitement:

```bash
php hyde make:post "A Magical Doodly Website is Finally Here"
```

In an instant, the blog post was ready, its words filled with excitement and charm. The Hyde Wizard nodded approvingly. “Now the world shall know of your journey, Zoe. This is how adventures begin—by sharing your story!”

But the Hyde Wizard wasn’t done yet. With a mysterious smile, he beckoned Zoe to follow further into the magic. “Come now, Zoe. Let us unveil a glimpse of what your website will look like. For this, we must conjure the Blog Feed Page, where all your posts will gather like a flock of enchanted words.”

With a sweep of his wand, he instructed Zoe to type:

```bash
php hyde publish:homepage
```

When the shimmering menu appeared, Zoe carefully selected [1], creating a page dedicated to her blog posts. As the magical command settled, the Hyde Wizard turned to Zoe with a knowing smile. “The magic needs a little spark to take full effect,” he said gently.

Understanding his meaning, Zoe answered the next prompt with a confident “Yes,” and the site began to rebuild itself, shimmering like stardust as the changes came to life. The Hyde Wizard watched proudly as the foundation grew before their eyes.

“Now,” he said, his voice lowering to a reverent tone, “it is time to ignite the Magical Engine. With this, your website will come alive, and you shall catch your first glimpse of your creation.” He gestured for Zoe to continue:

```bash
php hyde serve
```

Zoe held her breath and ran the incantation. The magical engine hummed to life, its gears turning invisibly in the depths of her laptop. She opened her browser, and there it was—a simple but elegant page displaying her very first blog post.

----------

![Default HydePHP Blog Feed](https://hydephp.melasistema.com/media/posts/zoe-tutorial/01-zoe-default-blog-feed.jpg "Default HydePHP Blog Feed")

----------

“It’s beautiful!” Zoe whispered, marveling at the default HydePHP blog feed. The structured simplicity of the design hinted at the endless possibilities lying just beneath the surface.

The Hyde Wizard smiled as Zoe’s eyes sparkled with wonder. “This, dear Zoe, is but the beginning. You’ve taken your first steps into a larger world of creation and connection. Imagine what will come next!”

Zoe nodded eagerly, but the wizard’s expression grew serious once more. “Before we can craft the landing page of your dreams, we must enhance your powers by installing a magical artifact—the HydePHP Layouts Manager. This will equip you with the layouts, components, and styles needed for the enchantments we are about to weave.”

With a wave of his staff, a shimmering list of instructions appeared before Zoe.

“To begin, invoke this spell in your terminal,” the wizard said:

```bash
composer require melasistema/hyde-layouts-manager
```

Zoe did as instructed, watching lines of text scroll across the terminal like incantations in a spellbook.

“Now, to channel this magic, you must set the foundation for your layouts. Rename the `.env.example` file to `.env` and add this line,” the wizard continued, his tone like that of a teacher passing down ancient knowledge:

```dotenv
DEFAULT_LAYOUT=melasistema
```

“This default configuration ensures your layouts will radiate with elegance and harmony. But know this: the magic of HydePHP allows you to define your own styles, should you ever wish to forge your path.”

Zoe added the line and closed the `.env` file with a triumphant click.

The wizard nodded approvingly. “Good. Next, we must publish the package’s configuration so it's magic can integrate with your project. Use this command to prepare the way:”

```bash
php hyde vendor:publish --provider="Melasistema\HydeLayoutsManager\HydeLayoutsManagerServiceProvider" --tag="hyde-layouts-manager-config"
```

Zoe ran the command, feeling a surge of confidence as the configuration files materialized in her project.

“Impressive,” the wizard remarked, his eyes glinting. “But there’s more work to be done. To harmonize your project’s styles with the Hyde Layouts Manager, we must merge its Tailwind configuration. We have two paths forward—choose wisely.”

The wizard’s staff illuminated two options in the air.

Automated Merge: “For speed and simplicity, use this command. But be warned, this will overwrite your existing `tailwind.config.js`. Back it up if you’ve customized it.”

```bash
php hyde tailwind:merge
```

Manual Merge: “Or, if you prefer precision, you may manually weave the Layouts Manager configuration into your `tailwind.config.js`. Here’s the structure:”

(The wizard conjured a glowing scroll, displaying the configuration Zoe could copy-paste.)


```javascript
const HydeLayoutsManagerConfig = require('./tailwind-layouts-manager.config.js');

module.exports = {
    darkMode: 'class',
    content: [
        './_pages/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './vendor/hyde/framework/resources/views/**/*.blade.php',
        ...HydeLayoutsManagerConfig.content,
    ],
    theme: {
        extend: {
            ...HydeLayoutsManagerConfig.theme.extend,
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        ...HydeLayoutsManagerConfig.plugins
    ],
};
```

Zoe chose the automated path, swiftly running the command and watching the terminal respond with magic.

“Finally,” the wizard said, “your components require Flowbite, a library of enchanted scripts and styles. Let us add this dependency.”

With a flick of his wrist, another command appeared:

```bash
php hyde package-json:merge
```

“And then, weave it into your project with this incantation:”

```bash
npm install
```

Zoe executed both spells, her fingers flying over the keyboard.

“To bind these scripts to your project,” the wizard continued, “you must update your `webpack.mix.js` with these instructions.” He pointed to another glowing scroll:


```javascript
let mix = require('laravel-mix');

mix.css('node_modules/flowbite/dist/flowbite.css', 'app.css')
    .js('node_modules/flowbite/dist/flowbite.js', 'app.js')
    .js('resources/assets/app.js', 'app.js')
    .postCss('resources/assets/app.css', 'app.css', [
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .setPublicPath('_site/media')
    .copyDirectory('_site/media', '_media');
```

“Finally, invoke the build process with this command,” he concluded:

```bash
npm run dev
```

The project whirred to life as the commands took effect. Zoe beamed with pride.

“Now,” the wizard declared, “you are ready for the next step—crafting your magical landing page.”

----------

### Step 2: The Magical Layout – Building the Perfect Landing Page

The Hyde Wizard raised his staff high and proclaimed, “Every grand creation must rest upon a solid foundation. To bring your vision to life, we must weave the magic of layouts into your site!”

He gestured toward the glowing code in the air. “These enchanted layouts, provided by the **HydePHP Layouts Manager**, enable your blog feed to seamlessly integrate with customizable components and themes. By applying the **@extends** directive, your page will inherit the full power of this magic.”

With a swirl of his staff, glowing runes etched themselves into the air. Zoe copied them into her file, replacing the old content of her `index.blade.php`.

```blade
@php($title = 'Zoe Blog')
@extends(config('hyde-layouts-manager.layouts.' . config('hyde-layouts-manager.default_layout') . '.app', 'hyde::layouts.app'))
@section('content')
 
    <main id="content" class="mx-auto max-w-7xl py-12 px-8">
        <header class="lg:mb-12 xl:mb-16">
            <h1 class="text-3xl text-left leading-10 tracking-tight font-extrabold sm:leading-none mb-8 md:mb-12 md:text-4xl md:text-center lg:text-5xl text-gray-700 dark:text-gray-200">
            Zoe's Journey</h1>
        </header>
     
        <div id="post-feed" class="max-w-3xl mx-auto">
            @include('hyde-layouts-manager::layouts.'.config('hyde-layouts-manager.default_layout').'.posts.blog-post-feed')
        </div>
    </main>
 
@endsection
```

“These lines,” he explained, “tie your page to the power of the layouts defined in the Layouts Manager. The `@extends` directive ensures your page inherits the enchanted scaffolding, while the `@include` spell draws in the blog post feed with all the benefits of your chosen theme.”

Zoe’s eyes widened as she read through the lines. "This means my Blog page is not only beautiful but fully integrated with the magical components and styles we've chosen!”

“Indeed,” the wizard affirmed, his voice warm with encouragement. “Your blog feed, once simple and unadorned, is now imbued with all the grace and flexibility the [HydePHP Layouts Manager](https://github.com/melasistema/hydephp-layouts-manager) has to offer.”

As Zoe absorbed this wisdom, the wizard’s eyes twinkled. “But wait, my dear, you’ve come prepared for this journey, haven’t you?”

Zoe nodded, a parchment unfurling in her hands. It was a vibrant display of her doodles—whimsical characters, enchanting landscapes, and magical creatures from her beloved book, Zoe and the Doodling World.

The wizard gasped in delight. “Oh, Zoe! You truly are ready for this path. But our mission is not yet complete.” His voice took on a deeper, more focused tone. “While the blog section with its announcement is crucial, what you need is a true landing page—a magical portal where visitors will feel invited into your world and can be guided to your books with ease.”

----------

With a flourish of his staff, glowing symbols appeared again. “Now,” the wizard said, his voice taking on a lighthearted tone, “we must rename your existing `index.blade.php` to `posts.blade.php`, preserving the blog feed layout. Then, we will craft a new `index.blade.php` file that will serve as your enchanting Home Page.”

The wizard paused, his eyes twinkling with playful mischief. “I hope you know how to rename a file, Zoe! Whether it’s by the mystical powers of the Finder, the sorcery of a code editor, or even a command-line spell, the choice is yours. After all,” he added with a chuckle, “every wizard has their own style.”

Zoe giggled as she took the parchment. “Don’t worry, I’ve got this!” she said confidently, and with a few swift movements (and maybe a little bit of magic), the files were renamed.

The wizard nodded approvingly. “Well done, Zoe. You’re truly mastering the art of creation. Now, let’s bring your new Home Page to life!”

“Now, in this new `index.blade.php` file, we shall create the foundation for your landing page,” the wizard continued, his tone filled with wonder. The base structure appeared before them, etched in glowing runes. Zoe carefully transcribed it into the new file:

```blade
    @php($title = 'Home')
    @extends(config('hyde-layouts-manager.layouts.' . config('hyde-layouts-manager.default_layout') . '.app', 'hyde::layouts.app'))
    
    @section('content')
        <!-- Your magical content goes here -->
    @endsection
```

The wizard smiled as Zoe reviewed the file. “This page will now serve as the welcoming gateway to your site. Simple, elegant, and full of potential, just like your journey. And if you ever wish to enhance it with animations or other charms, the [HydePHP Layouts Manage](https://github.com/melasistema/hydephp-layouts-manager)r will always be at your side!”

Zoe beamed with pride as she saved the file. Her magical Home Page was complete, a perfect starting point for her adventure.

Zoe watched intently as the wizard prepared the next spell. “Within this new structure,” he said, “we will first place a Carousel to showcase your enchanting doodles. Then, we shall add a Hero Section to invite your visitors to explore and buy your books. Watch closely, Zoe, for this is the magic that will guide them into your world.”

----------

The Hyde Wizard stood proudly before the glowing projection of Zoe’s landing page. “Ah, Zoe, we’ve come so far,” he said, his voice warm with pride. “But to truly complete this masterpiece, we must integrate the final components into your new `index.blade.php`. This will be the heart of your site—a page that captivates and invites all who visit.”

With a wave of his staff, the wizard conjured the finalized blueprint of the Home Page:

```blade
@php($title = 'Home')
@extends(config('hyde-layouts-manager.layouts.' . config('hyde-layouts-manager.default_layout') . '.app', 'hyde::layouts.app'))

@section('content')

    {!! app('layout.manager')->renderComponent('carousel', [
        'layout' => [
            'showIndicators' => false,
            'showControls' => false,
            'rounded' => false,
        ],
        'images' => [
            'media/zoe-doodle-showcase.png',
        ]]) 
    !!}

    <section class="max-w-8xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center">
            <!-- Left Column: Hero -->
            <div class="p-8 flex items-center">
                {!! app('layout.manager')->renderComponent('hero', [
                        'layout' => [
                            'showPrimaryButton' => true,
                            'showSecondaryButton' => false,
                            'showSubHeadingText' => true,
                        ],
                        'settings' => [
                            'headingTextAlign' => 'right',
                            'subHeadingTextAlign' => 'right',
                            'buttonsGroupAlign' => 'right',
                        ],
                    ]) 
                !!}
            </div>
            
            <!-- Right Column: Gallery -->
            <div class="p-8">
                {!! app('layout.manager')->renderComponent('gallery', [
                        'layout' => [
                            'gap' => '',
                            'rounded' => false,
                        ],
                    ]) 
                !!}
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 items-center">
            <!-- Left Column: Carousel -->
            <div class="p-8 flex items-center">
                {!! app('layout.manager')->renderComponent('carousel', [
                        'layout' => [
                            'showIndicators' => false,
                            'showControls' => false,
                            'rounded' => true,
                        ],
                    ]) 
                !!}
            </div>
            
            <!-- Right Column: Accordion -->
            <div class="p-8">
                {!! app('layout.manager')->renderComponent('accordion') !!}
            </div>
        </div>
    </section>

@endsection
```

The wizard gestured triumphantly. “There, Zoe! Your landing page now harmoniously combines a Carousel to captivate, a Hero Section to inspire, and a Gallery with a whimsical Accordion to charm your visitors. Together, they create an enchanting introduction to your magical world.”

Zoe clapped her hands in delight. “Thank you, Wizard! This is everything I dreamed of and more.”

The Hyde Wizard bowed deeply. “The greatest magic lies in creation, dear Zoe. Go forth and let the world marvel at your art.”

Zoe could hardly contain her excitement as her vision came to life. The wizard placed a hand on her shoulder. “Your journey, Zoe, is a testament to your determination and creativity. Soon, the world will see it too.”

  ----------

### Step 3: The Heartful Gift – Mastering Typography with the Font Manager

The Hyde Wizard’s eyes twinkled as he turned to Zoe. “Ah, dear Zoe, as you embark on your creative journey, there is one thing I cannot let you do alone. Finding the perfect combination of fonts from the vast seas of choices is a daunting task, even for a seasoned wizard like myself.”

With a flick of his staff, a parchment appeared in midair, adorned with elegant calligraphy and enchanting designs. “I have prepared this for you—a Chanting Charm, crafted specifically for your site. It contains fonts that are as unique as you are, selected with great care to bring your vision to life.”

Zoe’s eyes widened as she reached for the parchment. “You… you did this for me?” she asked, her voice filled with awe.

The wizard smiled warmly. “Of course, my dear. A website’s typography is its voice, and every creator deserves a voice that sings true to their heart. This charm is not just a tool—it’s a gift, woven with care and purpose, and designed to save you hours of toil and uncertainty.”

He gestured toward the glowing runes, now shaping themselves into a magical guide:

----------

The Font Manager allows you to tailor your site’s typography with ease. Using the `hyde-layouts-manager-fonts.json` file, you can customize fonts dynamically for every layout. Here’s how your Chanting Charm has been configured:


```json
{
  "layouts": {
    "melasistema": {
      "use_google_fonts": true,
      "families": {
        "primary": "Indie Flower:wght@400",
        "secondary": "Sour Gummy:wght@600",
        "display": "Sour Gummy:wght@600",
        "heading": "Sour Gummy:wght@600",
        "subheading": "Handlee:wght@400",
        "accent": "Just Another Hand:wght@400",
        "code": "Fira Code:wght@400;500",
        "small": "Amatic SC:wght@400;700"
      },
      "typography_mapping": {
        "h1": "display",
        "h2": "heading",
        "h3": "subheading",
        "h4": "subheading",
        "h5": "secondary",
        "h6": "secondary",
        "p": "primary",
        "small": "small",
        "code": "code",
        "blockquote": "display",
        "label": "secondary",
        "button": "heading"
      },
      "custom_css": {}
    }
  }
}
```

The wizard leaned closer, his voice soft with reassurance. “Every font, every mapping, has been chosen to complement your unique style. From the playful grace of Indie Flower for your paragraphs to the bold elegance of Sour Gummy for your headings, these choices will bring harmony and joy to your site.”

Zoe studied the parchment, marveling at the thoughtfulness of the selections. “But how will I make this charm work?”

“Ah, that’s simple,” the wizard replied, waving his staff to reveal another set of glowing instructions. “Place this configuration into the `config/hyde-layouts-manager-fonts.json` file. Once done, simply compile your assets with this spell:”

```bash
npm run dev
```

“And with that,” he added, “your typography will come alive with the magic of Google Fonts. Should you wish to tweak the charm or disable the Google Fonts altogether, you can modify use_google_fonts or adjust the families and mappings as you see fit. The world of typography is yours to shape.”

Zoe’s heart swelled with gratitude. “Thank you, Wizard. This is more than I ever expected.”

The Hyde Wizard beamed, placing a hand on her shoulder. “Every creator deserves to feel empowered and inspired, dear Zoe. Now go forth and let your fonts sing your story.”

![Zoe's Magical Website](https://hydephp.melasistema.com/media/posts/zoe-tutorial/zoe-website-screenshots-group.png 'Zoe’s Magical Website')

  ----------

### Step 4: The Final Spell – Publishing to the World

The Hyde Wizard waved his wand once more, and Zoe’s magical website was now ready for the world. “With the power of [HydePHP](https://hydephp.com), you can now make your site live for all to see,” the wizard said.

Zoe followed the last set of instructions the Hyde Wizard gave her, deploying her site with ease. No more complex technical challenges! The website was now online, ready to captivate audiences and display her beautiful, hand-crafted doodles.

Soon, visitors were drawn to Zoe’s site from all over the kingdom. They were enchanted by the magical landing page, captivated by the delightful font choices, and inspired by her artwork. One by one, people began to share her site, and Zoe's books became a best-seller on Amazon!

The wizard smiled knowingly, adding a final note of encouragement. “HydePHP’s magic doesn’t end with creation, Zoe. Your site’s static nature means it can be hosted almost anywhere, even on free platforms like Netlify or GitHub Pages. With no database to worry about, your site will always be fast, reliable, and cost-effective, allowing your creativity to shine without limits.”

----------

### The End – Zoe's Happy Ever After

Thanks to the Hyde Wizard and the tools of [HydePHP](https://hydephp.com) & [Layouts Manager](https://github.com/melasistema/hydephp-layouts-manager), Zoe’s dream had come true. No longer just a doodler, she had become a published author, a beloved artist, and a recognized force in the digital kingdom.

And so, Zoe lived happily ever after, knowing that with a little magic and the power of **HydePHP**, even the most whimsical dreams can come to life.

----------

### A Magical Scroll of Links

As Zoe's story concluded, the Hyde Wizard unfurled a glowing scroll filled with links and special thanks, a final touch to the enchanting journey.

✨ Link to Zoe’s Magical Website  
“Behold the fruits of our labor!” the wizard declared. Visit Zoe’s whimsical world and experience her magical doodles firsthand.  
🌐 [Zoe’s Website](https://hydewizard.melasistema.com)

📜 Link to the Hyde Wizard’s Treasure Trove  
“For those who wish to explore the arcane arts behind this creation,” the wizard said, tapping his staff, “you’ll find all the spells and scripts here.”  
🌐 [Hyde Wizard’s GitHub Repo](https://github.com/melasistema/hyde-wizard)

🎨 Link to the HydePHP Layouts Manager  
“The secret to crafting such a visually stunning site lies within this powerful tool,” the wizard explained. Customize your fonts, layouts, and styles to make your own magic.  
🌐 [HydePHP Layouts Manager Repository](https://github.com/melasistema/hydephp-layouts-manager)

“If you find this tool helpful,” the wizard added with a wink, “consider giving it a ⭐ on [GitHub](https://github.com/melasistema/hydephp-layouts-manager). And for those feeling adventurous, contributions are always welcome to expand the magic for others!”

----------

“Now, dear reader,” the wizard said, rolling up the scroll, “the magic is in your hands. Go forth and create your own enchanting tales!”
