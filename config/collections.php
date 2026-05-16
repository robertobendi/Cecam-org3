<?php

/**
 * CECAM site — content shape.
 *
 * Single-entry pages (Home, About, Flagship Call) live in the default
 * `pages` collection. Recurring scientific events are in `events`,
 * each routed under /program. Recurring lecture series sit in
 * `activities`. News is the default `posts` collection re-routed under
 * /news. No public-facing forms — CECAM uses mailto: throughout.
 */

return [

    'pages' => [
        'label'          => 'Pages',
        'label_singular' => 'Page',
        'icon'           => 'file',
        'route'          => '/{slug}',
        'template'       => 'page.twig',
        'order_by'       => 'updated_at DESC',
        'fields' => [
            'title'            => ['type' => 'text', 'required' => true, 'label' => 'Title'],
            'slug'             => ['type' => 'slug', 'required' => true, 'label' => 'Slug'],
            'eyebrow'          => ['type' => 'text', 'label' => 'Eyebrow', 'help' => 'Uppercase brass label above the title.'],
            'lede'             => ['type' => 'textarea', 'label' => 'Lede', 'help' => 'One- or two-sentence subtitle.'],
            'hero_image'       => ['type' => 'url', 'label' => 'Hero image', 'help' => 'Path to a /uploads/ image.'],
            'body'             => ['type' => 'markdown', 'label' => 'Body'],
            'meta_description' => ['type' => 'textarea', 'label' => 'Meta description'],
        ],
    ],

    'events' => [
        'label'          => 'Events',
        'label_singular' => 'Event',
        'icon'           => 'calendar',
        'route'          => '/program/{slug}',
        'template'       => 'event.twig',
        'list_template'  => 'program.twig',
        'order_by'       => 'publish_at ASC',
        'list_limit'     => 200,
        'fields' => [
            'title'        => ['type' => 'text', 'required' => true, 'label' => 'Title'],
            'slug'         => ['type' => 'slug', 'required' => true, 'label' => 'Slug'],
            'event_type'   => [
                'type'     => 'select',
                'options'  => ['workshop', 'school', 'conference', 'event'],
                'required' => true,
                'label'    => 'Type',
            ],
            'start_date'   => ['type' => 'datetime', 'required' => true, 'label' => 'Start date'],
            'end_date'     => ['type' => 'datetime', 'required' => true, 'label' => 'End date'],
            'location'     => ['type' => 'text', 'required' => true, 'label' => 'Location'],
            'organizers'   => ['type' => 'textarea', 'required' => true, 'label' => 'Organizers'],
            'summary'      => ['type' => 'textarea', 'required' => true, 'label' => 'Summary'],
            'body'         => ['type' => 'markdown', 'required' => true, 'label' => 'Body'],
            'external_url' => ['type' => 'url', 'label' => 'External URL'],
        ],
    ],

    'activities' => [
        'label'          => 'Activity Series',
        'label_singular' => 'Activity',
        'icon'           => 'sparkles',
        'route'          => '/activities/{slug}',
        'template'       => 'activity.twig',
        'list_template'  => 'activities.twig',
        'order_by'       => 'slug ASC',
        'fields' => [
            'title'        => ['type' => 'text', 'required' => true, 'label' => 'Series name'],
            'slug'         => ['type' => 'slug', 'required' => true, 'label' => 'Slug'],
            'monogram'     => ['type' => 'text', 'label' => 'Monogram', 'help' => 'One- or two-letter mark.'],
            'summary'      => ['type' => 'textarea', 'required' => true, 'label' => 'Summary'],
            'body'         => ['type' => 'markdown', 'required' => true, 'label' => 'Body'],
            'external_url' => ['type' => 'url', 'label' => 'External URL'],
        ],
    ],

    'posts' => [
        'label'          => 'News',
        'label_singular' => 'News item',
        'icon'           => 'edit',
        'route'          => '/news/{slug}',
        'template'       => 'post.twig',
        'list_template'  => 'post-list.twig',
        'order_by'       => 'publish_at DESC',
        'fields' => [
            'title'   => ['type' => 'text', 'required' => true, 'label' => 'Title'],
            'slug'    => ['type' => 'slug', 'required' => true, 'label' => 'Slug'],
            'excerpt' => ['type' => 'textarea', 'label' => 'Excerpt'],
            'body'    => ['type' => 'markdown', 'required' => true, 'label' => 'Body'],
            'thumbnail' => ['type' => 'url', 'label' => 'Thumbnail'],
            'author'  => ['type' => 'text', 'label' => 'Author'],
        ],
    ],

];
