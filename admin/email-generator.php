<!DOCTYPE html>
<html lang="en">

<?php $title='Email Generator' ?>
<?php include './partials/head.php' ?>

<body>
    <main class="page-wrapper rbt-dashboard-page">
        <div class="rbt-panel-wrapper">

            <!-- start header -->
            <?php $visibility = '@@display-class' ?>
            <?php include './partials/header.php' ?>
            <!-- End  header -->
             
             <!-- start mobilemenu -->
            <?php include './partials/mobilemenu.php' ?>
            <!-- End  mobilemenu -->

            <!-- Imroz Preloader -->
            <?php include './partials/preloader.php' ?>

            <!-- Start Left panel -->
            <?php include './partials/Leftpanel.php' ?>
            <!-- End Left panel -->

            <!-- Main content -->
            <div class="rbt-main-content">
                <div class="rbt-daynamic-page-content">

                    <!-- Dashboard Center Content -->
                    <div class="rbt-dashboard-content">
                        <div class="content-page">

                            <div class="chat-box-list pt--30" id="chatContainer">

                                <!-- Text Generator -->
                                <div class="chat-box author-speech bg-flashlight">
                                    <div class="inner">
                                        <div class="chat-section">
                                            <div class="author">
                                                <img class="w-100" src="assets/images/team/team-01.jpg" alt="Author">
                                            </div>
                                            <div class="chat-content">
                                                <h6 class="title">You</h6>
                                                <p>Write an email to your Office boss for 2 days off</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-box ai-speech bg-flashlight">
                                    <div class="inner top-flashlight leftside light-xl">
                                        <div class="chat-section">
                                            <div class="author">
                                                <img class="w-100" src="assets/images/team/avater.png" alt="ChatenAI">
                                            </div>
                                            <div class="chat-content">
                                                <h6 class="title">ChatenAI <span class="rainbow-badge-card">Bot</span></h6>
                                                <p class="mb--20">Subject: Request for Two-Day Leave</p>
                                                <p class="mb--20">Dear [Boss's Name],</p>
                                                <p class="mb--20">I hope this email finds you well. I am writing to formally request a two-day leave from work on [start date] to [end date]. The reason for my request is [mention the reason briefly, such as personal commitments, family matters, or any other relevant reason].</p>
                                                <p class="mb--20">I have ensured that all my current tasks and responsibilities are up to date, and I have briefed [colleague's name or team] about the status of my ongoing projects. I am committed to ensuring a smooth transition during my absence and will make myself available for any necessary handovers or additional information as needed.</p>
                                                <p class="mb--20">I understand the importance of my role in the team and will do my best to minimize any disruption caused by my temporary absence. I am confident that my colleagues will be able to handle any urgent matters in my absence, and I will ensure that I am reachable in case of any critical issues that may arise.</p>
                                                <p class="mb--20">Thank you for considering my request. I look forward to your approval and will be available to discuss any further details if necessary.</p>
                                                <p class="mb--10">Best regards,</p>
                                                <p class="mb--20">[Your Full Name]</p>
                                                <div class="reaction-section">
                                                    <div class="btn-grp">
                                                        <div class="left-side-btn dropup">
                                                            <button data-bs-toggle="modal" data-bs-target="#likeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-up"></i></button>
                                                            <button data-bs-toggle="modal" data-bs-target="#dislikeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-down"></i></button>
                                                            <button data-bs-toggle="modal" data-bs-target="#shareModal" class="react-btn btn-default btn-small btn-border"><i class="feather-share"></i></button>
                                                            <button type="button" class="react-btn btn-default btn-small btn-border dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="feather-more-vertical"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><i class="feather-copy"></i> Copy</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="right-side-btn">
                                                            <button class="react-btn btn-default btn-small btn-border">
                                                                <i class="feather-repeat"></i><span>Regenerate</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-box author-speech bg-flashlight">
                                    <div class="inner">
                                        <div class="chat-section">
                                            <div class="author">
                                                <img class="w-100" src="assets/images/team/team-01.jpg" alt="Author">
                                            </div>
                                            <div class="chat-content">
                                                <h6 class="title">You</h6>
                                                <p>Write an email to your Teacher for Study Tour</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-box ai-speech bg-flashlight">
                                    <div class="inner top-flashlight leftside light-xl">
                                        <div class="chat-section">
                                            <div class="author">
                                                <img class="w-100" src="assets/images/team/avater.png" alt="ChatenAI">
                                            </div>
                                            <div class="chat-content">
                                                <h6 class="title">ChatenAI <span class="rainbow-badge-card">Bot</span></h6>
                                                <p class="mb--20">Subject: Request for Participation in Study Tour</p>
                                                <p class="mb--20">Dear [Teacher's Name],</p>
                                                <p class="mb--20">I trust this email finds you in good health. My name is [Your Name], and I am a student in your [Class/Subject] class. I am writing to express my interest in and request permission to participate in the upcoming study tour that you mentioned during our recent class.</p>
                                                <p class="mb--20">I believe that the study tour would be a valuable opportunity for practical learning and exposure to real-world applications of the concepts we have been studying in class. The prospect of gaining firsthand experience in [mention specific areas or topics of the tour] is particularly exciting, and I am eager to enhance my understanding through this practical experience.</p>
                                                <p class="mb--20">If there are specific forms or procedures I need to follow to formally apply for participation, please guide me accordingly. Additionally, I am willing to provide any necessary information or documentation to support my request.</p>
                                                <p class="mb--20">Thank you for considering my request. I look forward to your guidance on the next steps and appreciate the opportunity to be part of this enriching educational experience.</p>
                                                <p class="mb--10">Best regards,</p>
                                                <p class="mb--20">[Your Full Name]</p>
                                                <div class="reaction-section">
                                                    <div class="btn-grp">
                                                        <div class="left-side-btn dropup">
                                                            <button data-bs-toggle="modal" data-bs-target="#likeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-up"></i></button>
                                                            <button data-bs-toggle="modal" data-bs-target="#dislikeModal" class="react-btn btn-default btn-small btn-border"><i class="feather-thumbs-down"></i></button>
                                                            <button data-bs-toggle="modal" data-bs-target="#shareModal" class="react-btn btn-default btn-small btn-border"><i class="feather-share"></i></button>
                                                            <button type="button" class="react-btn btn-default btn-small btn-border dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="feather-more-vertical"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><i class="feather-copy"></i> Copy</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="right-side-btn">
                                                            <button class="react-btn btn-default btn-small btn-border">
                                                                <i class="feather-repeat"></i><span>Regenerate</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="rbt-static-bar">
                            <form class="new-chat-form border-gradient">
                                <textarea id="txtarea" rows="1" placeholder="Send a message..."></textarea>
                                <div class="left-icons">
                                    <div title="ChatenAI" class="form-icon icon-gpt">
                                        <i class="feather-aperture"></i>
                                    </div>
                                </div>
                                <div class="right-icons">
                                    <div class="form-icon icon-plus" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Choose File">
                                        <input type="file" class="input-file" name="myfile" multiple>
                                        <i class="feather-plus-circle"></i>
                                    </div>
                                    <button class="form-icon icon-mic" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Voice Search">
                                        <i class="feather-mic"></i>
                                    </button>
                                    <button class="form-icon icon-send" id="sendButton" onclick="sendMessage()" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Send message">
                                        <i class="feather-send"></i>
                                    </button>
                                </div>
                            </form>
                            <p class="b3 small-text">ChatenAi can make mistakes. Consider checking important information.</p>
                        </div>
                    </div>

                    <!-- Dashboard Right Content -->
                    <div class="rbt-right-side-panel popup-dashboardright-section">

                        <div class="right-side-top">
                            <a class="btn-default bg-solid-primary" data-bs-toggle="modal" data-bs-target="#newchatModal">
                                <span class="icon"><i class="feather-plus-circle"></i></span>
                                <span>New Chat</span>
                            </a>
                        </div>
                        <div class="right-side-bottom">
                            <div class="small-search search-section mb--20">
                                <input type="search" placeholder="Search Here...">
                                <i class="feather-search"></i>
                            </div>

                            <div class="chat-history-section">
                                <h6 class="title">Today</h6>
                                <ul class="chat-history-list">
                                    <li class="history-box active">
                                        ChatenAI Defination
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Your last Question
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Business Shortcurt Methode
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Best way to maintain code Quality
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="chat-history-section has-show-more">
                                <h6 class="title">Yesterday</h6>
                                <ul class="chat-history-list has-show-more-inner-content">
                                    <li class="history-box">
                                        How to write a code
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Form Html CSS JS
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        HTML Shortcurt Methode
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Best way to maintain code Quality
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        ChatenAI Defination
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Your last Question
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Unique Shortcurt Methode
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Generate a circle Image
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <div class="rbt-show-more-btn">Show More</div>
                            </div>

                            <div class="chat-history-section has-show-more">
                                <h6 class="title">Previous 7 days</h6>
                                <ul class="chat-history-list has-show-more-inner-content">
                                    <li class="history-box">
                                        User Assistant Request
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Funtion Js
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Generate a Image
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Best way to maintain code Quality
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        ChatenAI Defination
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Your last Question
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Business Shortcurt Methode
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Best way to maintain Remote Team
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <div class="rbt-show-more-btn">Show More</div>
                            </div>

                            <div class="chat-history-section mb--100 has-show-more">
                                <h6 class="title">November</h6>
                                <ul class="chat-history-list has-show-more-inner-content">
                                    <li class="history-box">
                                        AI writing: Free Trial
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Your last Question
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Education Shortcurt Methode
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        1992 Environment Policy
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Senior UX/UI Design
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Your last Question
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Dark Mode Html CSS JS
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="history-box">
                                        Best way to maintain code Quality
                                        <div class="dropdown history-box-dropdown">
                                            <button type="button" class="more-info-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-more-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i class="feather-refresh-cw"></i> Regenerate</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-tag"></i> Pin Chat</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-file-text"></i> Rename</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="feather-share-2"></i> Share</a></li>
                                                <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash-2"></i> Delete Chat</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <div class="rbt-show-more-btn">Show More</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

            <!--New Chat Section Modal HTML -->
            <?php include './partials/newchatModal.php' ?>

            <!--Like Section Modal HTML -->
            <?php include './partials/likeModal.php' ?>

            <!--DisLike Section Modal HTML -->
            <?php include './partials/dislikeModal.php' ?>

            <!--Share Section Modal HTML -->
            <?php include './partials/shareModal.php' ?>

    </main>
    
            <!-- start script -->
            <?php include './partials/script.php' ?>
            <!-- End  script -->

</body>

</html>