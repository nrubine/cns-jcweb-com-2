<?php

/**
 * Site metadata configuration and description generator.
 * 
 * This module provides a structured way to manage site meta information
 * and generates a concise summary text for the site.
 */

function get_site_meta(): array
{
    return [
        'site_name'        => '竞彩网',
        'domain'           => 'cns-jcweb.com',
        'language'         => 'zh-CN',
        'keywords'         => ['竞彩网', '竞彩足球', '竞彩篮球', '体育彩票', '赛事分析'],
        'description'      => '竞彩网提供最新竞彩足球、竞彩篮球赛事数据与分析服务，助力彩民理性投注。',
        'author'           => '竞彩网编辑部',
        'version'          => '1.0.0',
        'last_updated'     => '2025-03-21',
        'contact_email'    => 'support@cns-jcweb.com',
        'social_links'     => [
            'weibo'  => 'https://weibo.com/jingcaiwang',
            'wechat' => '竞彩网官方公众号'
        ],
        'base_url'         => 'https://cns-jcweb.com',
        'meta_robots'      => 'index, follow',
        'favicon'          => '/favicon.ico',
        'theme_color'      => '#1a73e8'
    ];
}

function generate_meta_description(array $meta): string
{
    $parts = [];

    $parts[] = $meta['site_name'];

    if (!empty($meta['keywords'])) {
        $kw_str = implode('、', array_slice($meta['keywords'], 0, 3));
        $parts[] = $kw_str;
    }

    if (!empty($meta['description'])) {
        $parts[] = $meta['description'];
    }

    $parts[] = $meta['domain'];

    return htmlspecialchars(implode(' - ', $parts), ENT_QUOTES, 'UTF-8');
}

function render_meta_tags(array $meta): void
{
    echo '<meta charset="UTF-8">' . PHP_EOL;
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . PHP_EOL;
    echo '<meta name="description" content="' . generate_meta_description($meta) . '">' . PHP_EOL;
    echo '<meta name="keywords" content="' . htmlspecialchars(implode(', ', $meta['keywords']), ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
    echo '<meta name="author" content="' . htmlspecialchars($meta['author'], ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
    echo '<meta name="robots" content="' . htmlspecialchars($meta['meta_robots'], ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
    echo '<meta name="theme-color" content="' . htmlspecialchars($meta['theme_color'], ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
    echo '<link rel="canonical" href="' . htmlspecialchars($meta['base_url'], ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
    echo '<link rel="icon" href="' . htmlspecialchars($meta['favicon'], ENT_QUOTES, 'UTF-8') . '">' . PHP_EOL;
}

// Example usage
$site_meta = get_site_meta();
$meta_desc = generate_meta_description($site_meta);

// Uncomment the following line to see the generated description:
// echo $meta_desc;

// Uncomment the following line to render HTML meta tags:
// render_meta_tags($site_meta);