<?php require_once 'include/header.php'; 

// Check if slug is set
if(!isset($GET['slug'])){
    header('Location :'. BASE_URL);
    exit;
}

$slug = $_GET['slug'];

// Instantiate Category and post
$categoryObj = new Category();
$postObj = new Post(); 

// Get category by slug 
$category = $categoryObj->getCategoryBySlug($slug);

// Check if category exists
if(!$category){
    header('Location : '. BASE_URL);
    exit;
}

// Set page title
$pagetitle = $category->name;

// Get post in category
$posts = $postObj->getPostsByCategory($category->id);
?>

<h1><?php echo $category->name; ?>Posts</h1>

<div class="posts">
    <?php if (count($posts) >0) :?>
        <?php foreach ($posts as $post):?>
            <article class="post-card">
                <header class="post-header">
                    <h2>
                        <a href="<?php echo BASE_URL ?>/post.php?slug=<?php $post->slug ;?>">
                            <?php echo $post->title; ?>
                        </a>
                    </h2>
                    <div class="post-meta">
                        <span>Posted by <?php $post->username; ?></span>
                        <span>Posted on <?php date('F j, Y', strtotime($post->created_at)); ?></span>
                        
                    </div>
                </header>
                <div class="post-excerpt">
                    <?php 
                        // Show excerpt (first 200 characters of content)
                        echo substr(strip_tags($post->content), 0, 200) . '...';
                    ?>
                </div>
                <footer class="post-footer">
                    <a href="<?php echo BASE_URL ?>/post.php?slug=<?php echo $post->slug; ?>" class="read-more">Read More</a>
                </footer>
            </article>
        <?php endforeach;?>
    <?php else:?>
        <p>No posts found in this category.</p>
    <?php endif;?>
</div>

<?php require_once 'includes/footer.php';?>