<?php

/**
 * Fetch last episode from podcast feed
 */
function fetch_last_episode($feed_url)
{
    $feed = simplexml_load_file($feed_url);
    $last_episode = $feed->channel->item[0];
    return $last_episode;
}

/**
 * Publish last episode to Twitter using v2 api
 */
function publish_to_twitter($last_episode, $twitter_token)
{
    $title = $last_episode->title;
    $link = $last_episode->link;
    $content = "🎙️ Nuovo episodio:\n$title\n$link";

    $data = array(
        'status' => $content,
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n" .
                "Authorization: Bearer $twitter_token\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context = stream_context_create($options);
    return file_get_contents('https://api.twitter.com/2/tweets', false, $context);
}

/**
 * Add episode link into file
 */
function mark_as_published($last_episode, $file_path)
{
    $link = $last_episode->link;

    file_put_contents($file_path, "$link\n", FILE_APPEND);
}

/**
 * Search episode link into file
 */
function is_just_published($last_episode, $file_path)
{
    $link = $last_episode->link;
    $content = file_get_contents($file_path);
    return strpos($content, $link) !== false;
}

$feed_url = 'https://pensieriincodice.it/podcast/index.xml';
$twitter_token = $argv[1];
$file_path = './published_episodes.txt';

$last_episode = fetch_last_episode($feed_url);
if (!is_just_published($last_episode, $file_path)) {
    if (publish_to_twitter($last_episode, $twitter_token)) {
        mark_as_published($last_episode, $file_path);
    }
}