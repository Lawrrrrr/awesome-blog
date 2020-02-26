@extends('layouts.app')

@section('content')
    <div class="header-image">
        <img id="img-header" src="../images/technology.jpg" alt="" class="">
        <div class="centered text-white ">
            <h2>TECH&TECH BLOG</h2>
            <p>Welcome to Tech&Tech where you can post blogs about the technologies</p>
        </div>
    </div>
    <div class="container py-4">
        <h1 class="font-weight-bold text-primary">Tech News</h1>
        <div class="row">
            <div class="col-4 border-right border-top border-bottom border-muted text-center p-3">
                <img class="img-fluid" src="../images/htmlcss.jpg" alt="Card image cap">
                <h4 class="m-3 text-primary">Learn HTML/CSS</h4>
                <p>
                    HTML (the Hypertext Markup Language) and CSS (Cascading Style Sheets) are two of the core technologies for building Web pages.
                    HTML provides the structure of the page, CSS the (visual and aural) layout, for a variety of devices.
                    Along with graphics and scripting, HTML and CSS are the basis of building Web pages and Web Applications.
                </p>
                <div class="">
                    <a href="https://www.w3.org/standards/webdesign/htmlcss.html" class="btn btn-primary read-more">Read More</a>
                </div>
            </div>
            <div class="col-4 border-top border-bottom border-muted text-center p-3">
                <img class="img-fluid" src="../images/machine.jpg" alt="Card image cap">
                <h4 class="m-3 text-primary">What is Machine Learning?</h4>
                <p>
                    Machine learning is an application of artificial intelligence (AI) that provides systems the ability to automatically learn and improve
                    from experience without being explicitly programmed. Machine learning focuses on the
                    development of computer programs that can access data and use it learn for themselves.
                </p>
                <div class="">
                    <a href="https://expertsystem.com/machine-learning-definition/" class="btn btn-primary read-more">Read More</a>
                </div>
            </div>
            <div class="col-4 border-left border-top border-bottom border-muted text-center p-3">
                <img class="img-fluid" src="../images/toplang.jpg" alt="Card image cap">
                <h4 class="m-3 text-primary">Top 10 Best Programming Languages</h4>
                <p>
                    The world is becoming smarter day by day with the rapid development of Automation, Artificial Intelligence, Blockchain, etc.
                    We are witnessing several technological advents and their intervention in our day-to-day activities.
                    And at the heart of these technologies are programming languages...
                </p>

                <div class="">
                    <a href="https://www.edureka.co/blog/top-10-programming-languages/" class="btn btn-primary read-more">Read More</a>
                </div>
            </div>
        </div>
    </div>
@endsection

