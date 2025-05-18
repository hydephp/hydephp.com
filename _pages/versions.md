---
title: HydePHP Versions
description: Release dates and timelines for security and bug fixes for all versions of HydePHP.
navigation.hidden: true
---

# HydePHP Versions

Release dates and timelines for security and bug fixes for all versions of HydePHP.

<style>
.status-badge {
    display: inline-block;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-weight: 600;
    font-size: 0.75rem;
    text-transform: uppercase;
}
.status-all {
    background-color: #10B981;
    color: white;
}
.status-sec {
    background-color: #F59E0B;
    color: white;
}
.status-eol {
    background-color: #EF4444;
    color: white;
}
.status-fut {
    background-color: #6366F1;
    color: white;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 2rem;
}
th {
    background-color: #f3f4f6;
    text-align: left;
    padding: 0.75rem 1rem;
    font-size: 0.75rem;
    text-transform: uppercase;
    color: #6b7280;
}
td {
    padding: 1rem;
    border-bottom: 1px solid #e5e7eb;
}
.version-bold {
    font-weight: 700;
}
</style>

## Status

<div class="flex flex-wrap gap-4 mb-6">
    <div class="flex items-center">
        <span class="status-badge status-all mr-2">ALL</span>
        <span>Bug & security fixes</span>
    </div>
    <div class="flex items-center">
        <span class="status-badge status-sec mr-2">SEC</span>
        <span>Security fixes only</span>
    </div>
    <div class="flex items-center">
        <span class="status-badge status-eol mr-2">EOL</span>
        <span>End of Life</span>
    </div>
    <div class="flex items-center">
        <span class="status-badge status-fut mr-2">FUT</span>
        <span>Future release</span>
    </div>
</div>

## Currently supported versions

<div class="overflow-x-auto">
  <table>
    <thead>
      <tr>
        <th>Version</th>
        <th>Release date</th>
        <th>Bug Fixes Until</th>
        <th>Security Fixes Until</th>
        <th>PHP Versions</th>
        <th>JS Framework</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="version-bold">2.x</td>
        <td>Summer 2025 (Expected)</td>
        <td>TBD</td>
        <td>TBD</td>
        <td>8.2, 8.3, 8.4</td>
        <td>Tailwind 4, Alpine.js 3</td>
        <td><span class="status-badge status-fut">FUT</span></td>
      </tr>
      <tr>
        <td class="version-bold">1.x</td>
        <td>March 14, 2023</td>
        <td>TBD</td>
        <td>TBD</td>
        <td>8.1, 8.2, 8.3</td>
        <td>Tailwind 3, Alpine.js 3</td>
        <td><span class="status-badge status-all">ALL</span></td>
      </tr>
    </tbody>
  </table>
</div>

## Framework Dependencies

<div class="overflow-x-auto">
  <table>
    <thead>
      <tr>
        <th>HydePHP Version</th>
        <th>Laravel Version</th>
        <th>Tailwind Version</th>
        <th>Alpine.js Version</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="version-bold">2.x</td>
        <td>Laravel 11</td>
        <td>Tailwind 4</td>
        <td>Alpine.js 3</td>
      </tr>
      <tr>
        <td class="version-bold">1.x</td>
        <td>Laravel 10</td>
        <td>Tailwind 3</td>
        <td>Alpine.js 3</td>
      </tr>
    </tbody>
  </table>
</div>
