    <section class="single-blog">
        <div class="container">
            <article>
                <figure>
                    <a href="#">
                        <?php
                        include("./include/database.php");
                        $id = $_GET['id'];
                        $query = "select image from blogs where id = '$id'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <img src="admin/upload/<?php echo $row['image']; ?>" alt="">
                    </a>
                </figure>
                <div class="blog-wrapper">
                    <div class="blog-meta">
                        <div class="blog-category">
                            <a href="#">
                                COLLECTION
                            </a>
                        </div>
                        <div class="blog-date">
                            <a href="#">
                                April 25, 2022
                            </a>
                        </div>
                        <div class="blog-tags">
                            <a href="#">products</a>,
                            <a href="#">coats</a>
                        </div>
                    </div>
                    <h1 class="blog-title">
                        The Best Products That Shape Fashion
                    </h1>
                    <div class="blog-content">
                        <p>
                            Donec rhoncus quis diam sit amet faucibus. Vivamus pellentesque, sem sed convallis
                            ultricies, ante eros laoreet libero, vitae suscipit lorem turpis sit amet lectus. Quisque
                            egestas lorem ut mauris ultrices, vitae sollicitudin quam facilisis. Vivamus rutrum urna non
                            ligula tempor aliquet. Fusce tincidunt est magna, id malesuada massa imperdiet ut. Nunc non
                            nisi urna. Nam consequat est nec turpis eleifend ornare. Vestibulum eu justo lobortis mauris
                            commodo efficitur. Nunc pulvinar pulvinar cursus.
                        </p>
                        <p>
                            Nulla id nibh ligula. Etiam finibus elit nec nisl faucibus, vel auctor tortor iaculis.
                            Vivamus aliquet ipsum purus, vel auctor felis interdum at. Praesent quis fringilla justo. Ut
                            non dui at mi laoreet gravida vitae eu elit. Aliquam in elit eget purus scelerisque
                            efficitur vel ac sem. Etiam ante magna, vehicula et vulputate in, aliquam sit amet metus.
                            Donec mauris eros, aliquet in nibh quis, semper suscipit nunc. Phasellus ornare nibh vitae
                            dapibus tempor.
                        </p>
                        <blockquote>
                            <p>
                                Aliquam purus enim, fringilla vel nunc imperdiet, consequat ultricies massa. Praesent
                                sed turpis sollicitudin, dignissim justo vel, fringilla mi.
                            </p>
                        </blockquote>
                        <p>
                            Vivamus libero leo, tincidunt eget lectus rhoncus, finibus interdum neque. Curabitur aliquet
                            dolor purus, id molestie purus elementum vitae. Sed quis aliquet eros. Morbi condimentum
                            ornare nibh, et tincidunt ante interdum facilisis. Praesent sagittis tortor et felis finibus
                            vestibulum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus dapibus
                            turpis sit amet turpis tincidunt, sit amet mollis turpis suscipit. Proin arcu diam, pretium
                            nec tempus eu, feugiat non ex.
                        </p>
                        <p>
                            Donec feugiat tincidunt eros, ac aliquam purus egestas condimentum. Curabitur imperdiet at
                            leo pellentesque mattis. Fusce a dignissim est. In enim nisi, hendrerit placerat nunc quis,
                            porttitor lobortis neque. Donec nec nulla arcu. Proin felis augue, volutpat ac nunc a,
                            semper egestas dolor. Sed varius magna non lacus viverra, at dapibus sem interdum. Proin
                            urna nibh, maximus nec interdum ut, hendrerit et arcu. Nunc venenatis eget nulla at tempor.
                            Duis sed tellus placerat, bibendum felis quis, efficitur nisi. Morbi porta placerat urna et
                            pharetra. Proin condimentum, libero ac feugiat efficitur, est orci consectetur sapien, a
                            pretium leo leo in elit. Quisque fringilla finibus arcu, pretium posuere urna posuere sit
                            amet. Nullam quis sapien a augue aliquet accumsan eget eu risus. Ut at mi sed velit
                            condimentum porta. Proin vestibulum congue ullamcorper.
                        </p>
                        <p>
                            Nunc blandit ligula mi, quis commodo dolor fermentum sit amet. Nam vehicula pharetra lacus a
                            vulputate. Duis pulvinar vestibulum dolor, vel commodo arcu laoreet ac. Vestibulum sed
                            consequat purus, vitae auctor metus. Duis ut aliquet odio, at tincidunt nunc. Vestibulum
                            dignissim aliquet orci, rutrum malesuada ipsum facilisis vel. Morbi tempor dignissim nisi.
                            Maecenas scelerisque maximus justo eget sodales. Sed finibus consectetur vulputate.
                            Pellentesque id pellentesque nulla. Sed ut viverra eros. Vestibulum ut ligula quam.
                        </p>
                    </div>
                </div>
            </article>
            <!-- //review fatch by customer -->
            <div class="tab-panel-reviews">
                <h3>2 reviews for Basic Colored Sweatpants With Elastic Hems
                </h3>
                <div class="comments">
                    <ol class="comment-list">
                        <li class="comment-item">
                            <div class="comment-avatar">
                                <img src="img/avatars/avatar1.jpg" alt="">
                            </div>
                            <div class="comment-text">
                                <ul class="comment-stars">
                                    <li>
                                        <i class="bi bi-star-fill"></i>
                                    </li>
                                    <li>
                                        <i class="bi bi-star-fill"></i>
                                    </li>
                                    <li>
                                        <i class="bi bi-star-fill"></i>
                                    </li>
                                    <li>
                                        <i class="bi bi-star-fill"></i>
                                    </li>
                                    <li>
                                        <i class="bi bi-star-half"></i>
                                    </li>
                                </ul>
                                <div class="comment-meta">
                                    <strong>admin</strong>
                                    <span>-</span>
                                    <time>April 23, 2022</time>
                                </div>
                                <div class="comment-description">
                                    <p>
                                        Sed perspiciatis unde omnis iste natus error sit voluptatem
                                        accusantium doloremque laudantium.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="comment-item">
                            <div class="comment-avatar">
                                <img src="img/avatars/avatar1.jpg" alt="">
                            </div>
                            <div class="comment-text">
                                <ul class="comment-stars">
                                    <li>
                                        <i class="bi bi-star-fill"></i>
                                    </li>
                                    <li>
                                        <i class="bi bi-star-fill"></i>
                                    </li>
                                    <li>
                                        <i class="bi bi-star-fill"></i>
                                    </li>
                                    <li>
                                        <i class="bi bi-star-fill"></i>
                                    </li>
                                    <li>
                                        <i class="bi bi-star-half"></i>
                                    </li>
                                </ul>
                                <div class="comment-meta">
                                    <strong>admin</strong>
                                    <span>-</span>
                                    <time>April 23, 2022</time>
                                </div>
                                <div class="comment-description">
                                    <p>
                                        Sed perspiciatis unde omnis iste natus error sit voluptatem
                                        accusantium doloremque laudantium.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ol>
                </div>


                <?php
                //insert review by customer in database review

                ?>
                <!-- review form start -->
                <div class="review-form-wrapper">
                    <h2>Add a review
                    </h2>
                    <form action="" class="comment-form">
                        <p class="comment-notes">
                            Your email address will not be published. Required fields are marked with
                            <span class="required">*</span>
                        </p>
                        <div class="comment-form-rating">
                            <label>
                                Your rating
                                <span class="required">*</span>
                            </label>
                            <div class="stars">
                                <a href="#" class="star">
                                    <i class="i bi-star-fill"></i>
                                </a>
                                <a href="#" class="star">
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                </a>
                                <a class="star">
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                </a>
                                <a href="#" class="star">
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                </a>
                                <a href="#" class="star">
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                    <i class="i bi-star-fill"></i>
                                </a>
                            </div>
                        </div>
                        <div class="comment-form-comment form-comment">
                            <label for="form-review">
                                Your review
                                <span class="required">*</span>
                            </label>
                            <textarea cols="50" rows="10" id="form-review">

                            </textarea>
                        </div>
                        <div class="comment-form-author form-comment">
                            <label for="name">Name
                                <span class="required">*</span>
                            </label>
                            <input type="text" id="name">
                        </div>
                        <div class="comment-form-email form-comment">
                            <label for="email">Email
                                <span class="required">*</span>
                            </label>
                            <input type="email" id="email">
                        </div>
                        <div class="comment-form-cookie">
                            <input type="checkbox" id="cookie">
                            <label for="cookie">
                                Save my name, email, and website in this browser for the next time I
                                comment.
                                <span class="required">*</span>
                            </label>
                        </div>
                        <div class="form-submit">
                            <input class="btn btn-submit" type="submit" value="Send">
                        </div>

                    </form>

                </div>
                <!-- review form end -->
            </div>
        </div>
    </section>