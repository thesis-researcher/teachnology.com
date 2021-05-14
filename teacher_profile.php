<div class="page-content">
    <div class="top-user">
        <div style="float:left;margin-top:4%; margin-left:2%">
            <a class="set down" href="@Url.Action("Admin_Update_Info", "Admin")">
                <p class="down-content ">@*<i class="glyphicon glyphicon-cog"></i>*@Change Picture </p>
                <img class="image" src="~/User-Images/@Html.DisplayFor(model=>model.PROFILE)" />
            </a>
        </div>

        <p class="role">@Html.DisplayFor(model => model.role)</p>
        <h3 class="name">@Html.DisplayFor(model => model.fn) @*@Html.DisplayFor(model => model.mn)*@  @Html.DisplayFor(model => model.ln)</h3>
    </div>

    <div class="bot-user">
        <br />
        <a class="btn btn-red btn-edit edit" @*href="@Url.Action("Admin_Update_Info","Admin")"*@ onclick="document.getElementById('id03').style.display='block'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
        <p style="color:darkcyan; font-size:medium; font-family:Arial">@Html.DisplayFor(model => model.department)</p>
        <p style="font-size:small; text-transform:uppercase;"> @Html.DisplayFor(model => model.name)</p>

    </div>
</div>

<div class="credentials-container">
    @Html.ViewData["error"]
    <h3>Account</h3>
    <hr />
    <p>Joined</p>
    <hr />
    <p>Last Activity</p>
    <hr />
    <a class="a-cred" onclick="document.getElementById('id01').style.display='block'"><p class="cred"><i class="fas fa-key key"></i> Login credentials</p></a>
</div>


<div class="mid">
    <div class="mid-nav" id="myDIV">
        <ul>
            <li><a onclick="About()" class="mid-nav-a active">About</a></li>
            <li><a onclick="Info()" class="mid-nav-a">Info</a></li>
            <li><a onclick="Enrolled()" class="mid-nav-a">Enrolled</a></li>
        </ul>
    </div>
</div>

<div id="About" style="display:block;" class="answer_list">
    <div class="container-main-content">
        <h3 class="txt0e86a1"> About</h3><br />
        <p>@Html.DisplayFor(model => model.bio) </p>
    </div>
</div>

<div id="Info" style="display:none;" class="answer_list">
    <div class="container-main-content">
        <h3 class="txt0e86a1"> Info</h3><br />
        <h6>Name</h6>
        <ul>
            <li><p>Nickname : @Html.DisplayFor(model => model.fn)</p></li>
            <li><p>Complete Name : @Html.DisplayFor(model => model.fn) @Html.DisplayFor(model => model.mn)  @Html.DisplayFor(model => model.ln)</p></li>
        </ul>
        <h6>Basics</h6>
        <ul>

            <li><p>Department : @Html.DisplayFor(model => model.department)</p></li>
            <li><p>Birthdate : @Html.DisplayFor(model => model.birthdate)</p></li>
            <li><p>Teacher ID : @Html.DisplayFor(model => model.teacher_id)</p></li>
            <li><p>Gender : @Html.DisplayFor(model => model.gender)</p></li>
            <li><p>Address : @Html.DisplayFor(model => model.address)</p></li>
        </ul>
        <h6>Contact</h6>
        <ul>

            <li><p>Email : @Html.DisplayFor(model => model.email)</p> </li>
            <li><p>Phone : <a href="tel:@(ViewData["phone"])"> @Html.DisplayFor(model => model.phone)</a> </p> </li>
            <li><p>Social : <a href="http://www.@(ViewData["social"])"> @Html.ViewData["social"]</a></p> </li>
        </ul>

    </div>

</div>



<div id="Enrolled" style="display:none;" class="answer_list">
    <div class="container-main container-main-content">
        <h3 class="txt0e86a1"> Enrolled</h3>
    </div>
</div>


<div class="container-main-content">
    <h3 class="txt0e86a1"> Miscellaneous</h3>
    <p style="margin-left:4%">Logins: , Last Login:  </p>
</div>


<div class="credential">
    <h3>Account</h3>
    <hr />
    <p>Joined</p>
    <hr />
    <p>Last Activity</p>
    <hr />
    <a class="a-cred" onclick="document.getElementById('id01').style.display='block'"><p class="cred"><i class="fa fa-key key"></i> Login credentials</p></a>
</div>



<script>
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("mid-nav-a");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>

<div id="id01" class="modal2 modals">

    <div class="modals-container border-20 animate">
        <p class="head-cred">Credentials</p>
        <div class="modals-content">
            <ul class="modals-content-cred">
                <li><p>Email : @Html.DisplayFor(model => model.email)</p> </li>
                <li><p>Pass : @Html.Raw("\u2022\u2022\u2022\u2022\u2022")</p> </li>
            </ul>
            <ul class="modals-content-btn">
                <li><a class="c" onclick="document.getElementById('id02').style.display='block'">Change Password</a></li>
                <li><a class="x" onclick="document.getElementById('id01').style.display='none'">Close</a></li>
            </ul>
        </div>
    </div>
</div>

<div id="id02" class=" modal3 modals">

    <div class="modals-container border-20 border-width-40 animate">
        <p class="head-cred">Change Password</p>
        <form action="Admin_Change_Password" method="post">
            <div class="modals-content" style="margin-right:15%">
                <ul class="modals-content-cred">
                    <li>@Html.HiddenFor(model => model.ido)</li>
                    <li><p class="aleft">Old Pass: </p><p> <input type="password" name="pass" placeholder="--Old Password--" /></p></li>
                    <li><p class="aleft">New Pass: </p><p>@Html.EditorFor(model => model.newpass) </p></li>
                    <li><p class="aleft">Confirm: </p><p>@Html.EditorFor(model => model.confirm) </p></li>
                    @*<li><p>Old Pass : <input type="password" name="old" placeholder="Enter Old Password" /></p></li>
                        <li><p>New Pass : <input type="password" name="pass" placeholder="Enter New Password" /></p></li>
                        <li><p>Confirm : <input type="password" name="confirm" placeholder="Retype Your Password" /></p></li>*@
                </ul>
                @Html.ViewData["error"]
                <ul class="modals-content-btn" style="margin-left:25%">
                    <li><input class="c" onclick="document.getElementById('id02').style.display='none'" type="submit" value="Submit" /></li>
                    <li><a class="x" onclick="document.getElementById('id02').style.display='none'">Cancel</a></li>
                </ul>


            </div>
        </form>
    </div>
</div>

<div id="id03" class="modal4 outside-box">

    <div class="outside-box-container border-20 animate">
        <div class="imgcontainer">
            <span style="padding-top:15px;" onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="inside-box">
            <h2>Edit </h2>


        </div>
        <div class="inside-box2">

            <i class="glyphicon glyphicon-picture green icon"></i><a href="@Url.Action("Admin_Change_Picture","Admin")">Picture</a>
            <p>Change Your Profile Picture</p>

            <i class="glyphicon glyphicon-pencil green icon"></i><a href="@Url.Action("Admin_Change_Bio","Admin")">Description</a>
            <p>This is the description that people see when they visit your profile page.</p>

            <i class="fas fa-key icon key"></i><a>Password</a>
            <p>Select a different password.</p>

            <i class="glyphicon glyphicon-info-sign blue icon"></i><a href="@Url.Action("Admin_Update_Info","Admin")">Info</a>
            <p>Edit your account info, such as your name, birthdate and email address.</p>

            <i class="fab fa-facebook blue icon"></i><a>Social Media</a>
            <p>Social media settings</p>
        </div>
    </div>
</div>

<script>

    var modal2 = document.getElementById('id01');
    var modal3 = document.getElementById('id02');
    var modal4 = document.getElementById('id03');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal2) {
            modal2.style.display = "none";
        }

        else if (event.target == modal3) {
            modal3.style.display = "none";
        }

        else if (event.target == modal4) {
            modal4.style.display = "none";
        }
    }

</script>