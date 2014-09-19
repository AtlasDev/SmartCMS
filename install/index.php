<!DOCTYPE html>
<html>
    <head>
        <title>Install - SmartCMS</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="js/jquery.bootstrap.wizard.js"></script>
        <script src="js/wizard.js"></script>
    </head>
    <body>
        <div class='container'>
            <div class="span10">
                <section id="wizard">
                    <div id="wizard" class="tabbable tabs-left">
                        <ul>
                            <li><a href="#wizard-tab1" data-toggle="tab">First</a></li>
                            <li><a href="#wizard-tab2" data-toggle="tab">Second</a></li>
                            <li><a href="#wizard-tab3" data-toggle="tab">Third</a></li>
                            <li><a href="#wizard-tab4" data-toggle="tab">Forth</a></li>
                            <li><a href="#wizard-tab5" data-toggle="tab">Fifth</a></li>
                            <li><a href="#wizard-tab6" data-toggle="tab">Sixth</a></li>
                            <li><a href="#wizard-tab7" data-toggle="tab">Seventh</a></li>
                        </ul>
                        <div class="progress progress-info progress-striped">
                            <div class="bar"></div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="wizard-tab1">
                                <p>I'm in Section 1.</p>
                            </div>
                            <div class="tab-pane" id="wizard-tab2">
                                <p>Howdy, I'm in Section 2.</p>
                            </div>
                            <div class="tab-pane" id="wizard-tab3">
                                3
                            </div>
                            <div class="tab-pane" id="wizard-tab4">
                                4
                            </div>
                            <div class="tab-pane" id="wizard-tab5">
                                5
                            </div>
                            <div class="tab-pane" id="wizard-tab6">
                                6
                            </div>
                            <div class="tab-pane" id="wizard-tab7">
                                7
                            </div>
                            <ul class="pager wizard">
                                <li class="previous first"><a href="javascript:;">First</a></li>
                                <li class="previous"><a href="javascript:;">Previous</a></li>
                                <li class="next last"><a href="javascript:;">Last</a></li>
                                <li class="next"><a href="javascript:;">Next</a></li>
                                <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                            </ul>
                        </div>    
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>