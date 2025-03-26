<?php
$pageTitle =' Home';
require_once 'includes/header.php';

// Instantiate Post
$post =new Post();

// Get posts
$post = $post->getPosts();

?>

<h1>Latest Blog Posts</h1>

<div class="posts">
    <?php foreach ($posts as $post) :?>
        <article class="post-card">
            <header class="post-header">
                <h2>
                    <a href="<?php echo BASE_URL ?>/post.php/slug=<?php $post->slug; ?>">
                        <?php echo $post->title; ?>
                    </a>
                </h2>
                <div class="post-meta">
                    <span>Posted by <?php $post->username; ?></span>

                    <span>Posted on <?php date(' F j, Y', strtotime ($post->created_at)); ?></span>

                    <span>In <a href="<?php echo BASE_URL ?>/category.php?slug=<?php echo strtolower(str_replace(' ','-', $post->category)) ?>">
                        <?php echo $post->category; ?></a></span>
                </div>
            </header>
            <div class="post-excerpt">
                <?php 
                    // Show excerpt( first 200 characters of content )
                    echo substr(strip_tags($post->content), 0, 200) . '...';
                ?>
            </div>
            <footer class="post_footer">
                <a href="<?php echo BASE_URL ?>/post.php?slug=<?php echo $post->slug; ?>"class="read-more">Read More</a>
            </footer>
        </article>
    <?php endforeach; ?>
</div>

<?php require_once 'includes/footer.php';?>