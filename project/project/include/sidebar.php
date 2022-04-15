<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!-- sidebar -->
<div id="sidebar">
            <div class="inner">

                <!-- Search -->
                    <!-- <section id="search" class="alt">
                        <form action="../sidebar/sidebarSearch.php" method="GET" action="#">
                            <input type="text" name="query" id="query" placeholder="Search" />
                        </form>
                    </section> -->

                <!-- Menu -->
                    <nav id="menu">

                        <ul>
                            <li>
                                <span class="opener"><header class="major"><h2>레시피 종류</h2></header></span>
                                <ul>
                                    <?php
                                    $sql = "SELECT * FROM myBlogs";
                                    $result = $connect -> query($sql);
                                    $blogInfo = $result -> fetch_array(MYSQLI_ASSOC); 
                                   
                                    ?>
                                    <li><a href="../blog/blog.php?blogCategory=식사&page=1">식사</a></li> 
                                    <li><a href="../blog/blog.php?blogCategory=디저트&page=1">디저트</a></li>
                                    <li><a href="../blog/blog.php?blogCategory=간식&page=1">간식</a></li>
                                    <li><a href="../blog/blog.php?blogCategory=야식&page=1">야식</a></li>
                                    <li><a href="../blog/blog.php?blogCategory=안주&page=1">안주</a></li>
                                </ul>
                            </li>
                            <li>
                                <span class="opener"><header class="major"><h2>랭킹</h2></header></span>
                                <ul>
                                    <li><a href="#">조회수 랭킹</a></li>
                                    <li><a href="#">추천수 랭킹</a></li>
                                </ul>
                            </li>
                            <li>
                                <header class="major"><h2><a href="../board/board.php">자유게시판</a></h2></header>
                            </li>
                        </ul>
                    </nav>

                <!-- Section -->
                    <section>
                        <header class="major">
                            <h2>광고</h2>
                        </header>
                        <div class="mini-posts">
                            <article>
                                <iframe src="https://ads-partners.coupang.com/widgets.html?id=573253&template=carousel&trackingCode=AF2591611&subId=&width=300&height=300" width="300" height="300" frameborder="0" scrolling="no" referrerpolicy="unsafe-url"></iframe>
                            </article>
                        </div>
                        <ul class="actions">
                            <!-- <li><a href="#" class="button1">더보기</a></li> -->
                        </ul>
                    </section>

                <!-- Section -->
                    <section>
                        <header class="major">
                            <h2>사이트 문의</h2>
                        </header>
                        <ul class="contact">
                            <li class="icon solid fa-envelope"><a href="#">information@untitled.tld</a></li>
                            <li class="icon solid fa-phone">(000) 000-0000</li>
                            <li class="icon solid fa-home">1234 Somewhere Road #8254<br />
                            Nashville, TN 00000-0000</li>
                        </ul>
                    </section>

                <!-- Footer -->
                    <footer id="footer">
                        <p class="copyright">&copy; 2022 6조 요복조복. All rights reserved. </p>
                    </footer>

            </div>
        </div>