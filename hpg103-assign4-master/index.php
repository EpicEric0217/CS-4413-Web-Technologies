<?php session_start(); ?>
<head>
    <title>&#60;Assignment 4&#62;</title>
    <link rel="stylesheet" href="assign4.css">
    <?php
    // First we check which button was clicked,
    // specifically checking if the 'UTSA Theme' button was clicked by the user.
    if(isset($_POST['UTSA']))
    {
//        If 'first_cell' in session associative array equal to first_cell AND 'last_cell' in
// session associative array equal to last_cell selector
        if($_SESSION['first_cell'] == 'first_cell' && $_SESSION['last_cell'] == 'last_cell')
        {
//            set first_cell and last_cell session variables to the UTSA theme selectors and the body session variable to the body_table selector
            $_SESSION['first_cell'] = 'first_cell_UTSA_Theme';
            $_SESSION['body'] = 'body_table';
            $_SESSION['last_cell'] = 'last_cell_UTSA_Theme';
        }
        //now we check if the session variables for UTSA theme are equal to 'first_cell_dark_theme',
        // 'last cell_dark_theme', and 'body_table_dark_theme' selectors
        else if($_SESSION['first_cell'] == 'first_cell_dark_theme' && $_SESSION['last_cell'] == 'last_cell_dark_theme' &&  $_SESSION['body'] == 'body_table_dark_theme')
        {
//            set first_cell and last_cell session variables to the UTSA theme selectors and the body session variable to the body_table selector
            $_SESSION['first_cell'] = 'first_cell_UTSA_Theme';
            $_SESSION['body'] = 'body_table';
            $_SESSION['last_cell'] = 'last_cell_UTSA_Theme';
        }
        else if (isset($_SESSION['first_cell']) && isset($_SESSION['last_cell']) && isset($_SESSION['body'])){ //otherwise
            //set the first, middle, and last column session variables to their 'regular' selectors.
            $_SESSION['first_cell'] = 'first_cell';
            $_SESSION['body'] = 'body_table';
            $_SESSION['last_cell'] = 'last_cell';
        }
        else
        {
            $_SESSION['first_cell'] = 'first_cell';
            $_SESSION['body'] = 'body_table';
            $_SESSION['last_cell'] = 'last_cell';
        }
    }
    // Now, we Check which button was clicked by the user
    // and check if the 'Dark Mode' button is clicked by the user then...
    else if(isset($_POST['Dark']))
    {
        //if first cell session variable is equal to the first_cell selector and the last column session var.
        // equal to last_column selector and body session var. equal to regular body table selector.
        if($_SESSION['first_cell'] == 'first_cell' && $_SESSION['last_cell'] == 'last_cell' &&  $_SESSION['body'] == 'body_table')
        {
//            set first_cell and last_cell session variables to the dark theme selectors and the
//            body session variable to the body_table dark theme selector
            $_SESSION['first_cell'] = 'first_cell_dark_theme';
            $_SESSION['last_cell'] = 'last_cell_dark_theme';
            $_SESSION['body'] = 'body_table_dark_theme';
        }
        //if first cell session variable is equal to the first_cell selector for UTSA theme and the last column session var. equal to last_column selector for UTSA theme and body
        //session var. equal to regular body table selector.
        else if($_SESSION['first_cell'] == 'first_cell_UTSA_Theme' && $_SESSION['last_cell'] == 'last_cell_UTSA_Theme' &&  $_SESSION['body'] == 'body_table')
        {
//            set first_cell and last_cell session variables to the dark theme selectors and the
//            body session variable to the body_table dark theme selector
            $_SESSION['first_cell'] = 'first_cell_dark_theme';
            $_SESSION['last_cell'] = 'last_cell_dark_theme';
            $_SESSION['body'] = 'body_table_dark_theme';
        }
        //otherwise...
        else if(isset($_SESSION['first_cell']) && isset($_SESSION['last_cell']) && isset($_SESSION['body'])){
            //set the first, middle, and last column session variables to their
            // 'regular' selectors.
            $_SESSION['first_cell'] = 'first_cell';
            $_SESSION['last_cell'] = 'last_cell';
            $_SESSION['body'] = 'body_table';
        }
    }
    // when neither of the buttons are clicked then set the default css.
    else {
        if(!isset($_SESSION['first_cell']) && !isset($_SESSION['last_cell']) && !isset($_SESSION['body']))
        {
            //set the first, middle, and last column session variables to their
            // 'regular' selectors.
            $_SESSION['first_cell'] = 'first_cell';
            $_SESSION['last_cell'] = 'last_cell';
            $_SESSION['body'] = 'body_table';
        }
    }
    ?>
</head>
<!--here I link the body of the html to the 'body' session variable.-->
<body id="<?php echo $_SESSION['body'] ?>">
<table id="main_table">
    <tr>
        <th id="name_plate">
            <h1>
                Eric Samuel Huddleston
            </h1>
            <h3>
                Software Engineer
            </h3>
        </th>
        <th>
            <div>

                <img src="60586553_2017892858339010_4683322125849722880_o (1) (1).jpg" id="image_1">
            </div>
        </th>
    </tr>
</table>
<div class="div-line">
    <hr id ="line">
</div>
<table id="content_table">
    <tr>
        <!--        Here I link the first cell to the 'first_cell' session variable-->
        <td id="<?php echo $_SESSION['first_cell'] ?>">
            <h4>Menu</h4><hr>
            <ul align="left">
                <li><a class='link_color' href="https://github.com/EpicEric0217">Github</a></li>
                <li><a class='link_color' href="html/courses.html">Courses</a></li>
                <li><a class='link_color' href="https://www.utsa.edu/">UTSA</a></li>
            </ul>

        </td>
        <td id = "middle_cell">
            <h4>About Me</h4>
            <div>
                <p id = "text_para">
                    <img src="51910946_1875014519293512_1069284098918318080_o.jpg" id="image_2">
                    I'm a Senior at UTSA. I'm a computer science major, taking electives towards my concentration in cyber security. I grew up here in San Antonio mostly, albeit I did spend time
                    in Dallas as well. Additionally I went to John Marshall High School and that's where I discovered my love for software development. This was through the design of a robot for
                    the robotics club, wherein we had to write the Java code for it's Lego Mindstorms "brain" so as to make it distinguish colors, move, and so on. After graduating high school
                    I worked part time at the grocery store, then tutored math at the community college.
                </p>

            </div>

            <p> This summer I worked with a local infosec contractor as an intern, Raz-logic llc. Notably I helped patch up security holes in their website and integrate their file system
                with AWS. The internship not only allowed me the opportunity to learn best practices and apply knowledge from the classroom, but also build valuable connections.Because of
                this I gained a demonstrable knowledge of secure software design techniques and practices. Additionally I would also like to mention that I have experience with programming
                languages Java, C, C++, and scripting languages bash and python in Linux secure shell, as well as CSS, html, and PHP with Web development.</p>
        </td>
        <!--        Here I link the last cell to the last_cell' session variable-->
        <td id="<?php echo $_SESSION['last_cell'] ?>">
            <h4>Enrolled Courses</h4><hr>
            <ol>
                <li>CS3723</li>
                <li>CS3853</li>
                <li>CS4413</li>
                <li>CS4663</li>
            </ol>
            <h5>Theme Toggles</h5><hr>
            <form action="index.php" method="post">
                <input type="submit" name="UTSA" value="UTSA Theme" class="button1">
                <input type="submit" name="Dark" value="Dark Mode" class="button2">
            </form>
        </td>
    </tr>
</table>
<div id="footer">
    Copyright 2020, Eric Samuel Huddleston
</div>
</body>