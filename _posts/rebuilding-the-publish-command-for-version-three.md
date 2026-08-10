---
title: "Rebuilding the publish command for version three"
description: "One command now does the work of three. Why the old publish commands had to go, how the interactive picker works, and what designing a command surface actually means."
category: "devlog"
author: "Emma De Silva"
date: "2026-07-02"
---

Hyde has always let you publish vendor files into your project, taking templates and configs that ship inside the framework and copying them into your codebase where you can edit them. The feature is good. The interface to it grew like ivy. By version two we had three separate commands doing variations of the same job:

```terminal title="the old way"
$ php hyde <fg=gray;options=strikethrough>publish:homepage</>
$ php hyde <fg=gray;options=strikethrough>publish:views</>
$ php hyde <fg=gray;options=strikethrough>publish:configs</>
```

Each one had its own flags, its own prompts, and its own slightly different idea of what "publishing" meant. None of them were wrong. Together, they were a maze.

## Three front doors is zero front doors

The problem with parallel commands is discovery. A newcomer running `php hyde list` sees three publish entries and has to reverse-engineer the taxonomy before they can act. Is a homepage a view? Are configs publishable per-file? The command list, which should be a map, becomes a quiz.

A CLI is an API with a human on the other end, and it deserves the same design care. When we review a PHP interface we ask whether the method names reveal the model. The old publish commands revealed the git history instead: each was added when a need appeared, named for the moment rather than the whole.

> A command surface should describe what the tool believes, and Hyde believes publishing is one action with many targets.

## The new shape

Version three collapses everything into a single verb. Run it bare and Hyde asks what you want, using the same prompt toolkit Laravel developers already know:

```terminal title="hyde ~ zsh"
$ php hyde publish

<question> Which group would you like to publish?</question>
<info> ❯</info> views    <fg=gray>Blade templates and components</>
   configs  <fg=gray>Configuration files</>
   layouts  <fg=gray>Page and homepage layouts</>
```

Know what you want? Name it. Want a single file? Pass a path fragment and Hyde matches it against everything publishable, so you never copy fourteen templates to edit one:

```terminal title="hyde ~ zsh"
$ php hyde publish views navigation
<info>✓ Published components/navigation.blade.php</info>
```

The published file lands in your project as plain Blade, yours to reshape:

```blade title="resources/views/vendor/hyde/components/navigation.blade.php"
{{-- Now yours. Edit freely, Hyde uses this copy from here on. --}}

<nav aria-label="Main navigation">
    @foreach($navigation->items as $item)
        <x-hyde::nav-link :item="$item" />
    @endforeach
</nav>
```

## What we removed, and how

Deleting public API is a promise-keeping exercise, so the removal follows the same rules as every Hyde release:

- The old command names keep working in v3 as aliases that forward to the new command.
- Calling an alias prints a one-line notice with the modern equivalent, once per session, never nagging.
- The upgrade guide documents every renamed flag with a before-and-after table.

We also said no to some things along the way. A generic `--config` override flag was proposed and rejected, because a flag that can change anything documents nothing. That decision got its own write-up in May.

## The lesson for your own tools

If you maintain a CLI, run `list` on it and read the output as a stranger. Every command that makes a newcomer ask "how is this different from that one?" is a design debt with compounding interest. Merging three commands into one deleted code, deleted docs, and deleted a whole category of confused issues before they could be filed.

Version three is being built in the open, and the publish rebuild is on the beta branch now. Try it, break it, and tell me what the picker should do that it doesn't. The issue tracker is the front door, and a human answers it.
