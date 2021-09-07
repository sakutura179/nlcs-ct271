function author() {
    var check = true;
    //username
    if (document.querySelector('#username') != null) {
        var x = document.querySelector('#username').value;
        var BTCQUSER = /^[A-Za-z0-9]{2,20}$/;
        if (x === null || x === '') {
            document.querySelector('#invalid-username').innerHTML = 'Vui lòng nhập tài khoản'
            document.querySelector('#invalid-username').style.visibility = 'visible';
            document.querySelector('#username').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQUSER.test(x) === false) {
                document.querySelector('#invalid-username').innerHTML = 'Tài khoản phải từ 2 - 20 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-username').style.visibility = 'visible';
                document.querySelector('#username').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-username').innerHTML = 'ok';
                document.querySelector('#invalid-username').style.visibility = 'hidden';
                document.querySelector('#username').style.border = '0';
                document.querySelector('#username').style.borderBottom = '1px solid';
            }
        }
    }

    //pass
    if (document.querySelector('#password') != null) {
        var x = document.querySelector('#password').value;
        var BTCQPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-pass').innerHTML = 'Vui lòng nhập mật khẩu'
            document.querySelector('#invalid-pass').style.visibility = 'visible';
            document.querySelector('#password').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQPASS.test(x) === false) {
                document.querySelector('#invalid-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
                document.querySelector('#invalid-pass').style.visibility = 'visible';
                document.querySelector('#password').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-pass').innerHTML = 'ok';
                document.querySelector('#invalid-pass').style.visibility = 'hidden';
                document.querySelector('#password').style.border = '0';
                document.querySelector('#password').style.borderBottom = '1px solid';
            }
        }
    }

    //repass
    if (document.querySelector('#re-password') != null) {
        var x = document.querySelector('#re-password').value;
        var BTCQREPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-re-pass').innerHTML = 'Vui lòng nhập lại mật khẩu'
            document.querySelector('#invalid-re-pass').style.visibility = 'visible';
            document.querySelector('#re-password').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQREPASS.test(x) === false) {
                document.querySelector('#invalid-re-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
                document.querySelector('#invalid-re-pass').style.visibility = 'visible';
                document.querySelector('#re-password').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-re-pass').innerHTML = 'ok';
                document.querySelector('#invalid-re-pass').style.visibility = 'hidden';
                document.querySelector('#re-password').style.border = '0';
                document.querySelector('#re-password').style.borderBottom = '1px solid';
            }
        }
    }

    //pass - repass
    if (document.querySelector('#password').value != document.querySelector('#re-password').value) {
        document.querySelector('#invalid-re-pass').innerHTML = 'Mật khẩu đã nhập không khớp! Hãy thử lại';
        document.querySelector('#invalid-re-pass').style.visibility = 'visible';
        document.querySelector('#re-password').style.border = '2px solid red';
        check = false;
    }
    //fullname
    if (document.querySelector('#fullname') != null) {
        var x = document.querySelector('#fullname').value;
        var BTCQFULL = /^[^0-9\`\~\!\@\#\$\%\^\&\*\)\(\]\[\\\;\'\,\.\/\+\-\=\_\"\}\{\|\:\?\>\<]{1,50}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-fullname').innerHTML = 'Vui lòng nhập họ tên'
            document.querySelector('#invalid-fullname').style.visibility = 'visible';
            document.querySelector('#fullname').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQFULL.test(x) === false) {
                document.querySelector('#invalid-fullname').innerHTML = 'Họ tên phải từ 1 - 50 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-fullname').style.visibility = 'visible';
                document.querySelector('#fullname').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-fullname').innerHTML = 'ok';
                document.querySelector('#invalid-fullname').style.visibility = 'hidden';
                document.querySelector('#fullname').style.border = '0';
                document.querySelector('#fullname').style.borderBottom = '1px solid';
            }
        }
    }

    //email
    if (document.querySelector('#email') != null) {
        var x = document.querySelector('#email').value;
        var BTCQEMAIL = /^[^\`\~\!\#\$\%\^\&\*\)\(\]\[\\\;\'\,\/\+\-\=\"\}\{\|\:\?\>\<]{7,100}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-email').innerHTML = 'Vui lòng nhập email'
            document.querySelector('#invalid-email').style.visibility = 'visible';
            document.querySelector('#email').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQEMAIL.test(x) === false) {
                document.querySelector('#invalid-email').innerHTML = 'Email phải từ 7 - 100 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-email').style.visibility = 'visible';
                document.querySelector('#email').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-email').innerHTML = 'ok';
                document.querySelector('#invalid-email').style.visibility = 'hidden';
                document.querySelector('#email').style.border = '0';
                document.querySelector('#email').style.borderBottom = '1px solid';
            }
        }
    }

    //birth_day
    if (document.querySelector('#birth_day') != null) {
        var x = document.querySelector('#birth_day').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-bday').innerHTML = 'Vui lòng nhập ngày sinh'
            document.querySelector('#invalid-bday').style.visibility = 'visible';
            document.querySelector('#birth_day').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-bday').innerHTML = 'ok';
            document.querySelector('#invalid-bday').style.visibility = 'hidden';
            document.querySelector('#birth_day').style.border = '0';
            document.querySelector('#birth_day').style.borderBottom = '1px solid';
        }
    }

    //address
    if (document.querySelector('#address') != null) {
        var x = document.querySelector('#address').value;
        var BTCQADD = /^[^\`\~\!\@\#\$\%\^\&\*\)\(\]\[\\\;\'\+\-\=\_\"\}\{\|\:\?\>\<]{1,100}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-address').innerHTML = 'Vui lòng nhập địa chỉ'
            document.querySelector('#invalid-address').style.visibility = 'visible';
            document.querySelector('#address').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQADD.test(x) === false) {
                document.querySelector('#invalid-address').innerHTML = 'Địa chỉ phải từ 1 - 100 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-address').style.visibility = 'visible';
                document.querySelector('#address').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-address').innerHTML = 'ok';
                document.querySelector('#invalid-address').style.visibility = 'hidden';
                document.querySelector('#address').style.border = '0';
                document.querySelector('#address').style.borderBottom = '1px solid';
            }
        }
    }

    //phone_no
    if (document.querySelector('#phone_no') != null) {
        var x = document.querySelector('#phone_no').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-phone').innerHTML = 'Vui lòng nhập số điện thoại'
            document.querySelector('#invalid-phone').style.visibility = 'visible';
            document.querySelector('#phone_no').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-phone').innerHTML = 'ok';
            document.querySelector('#invalid-phone').style.visibility = 'hidden';
            document.querySelector('#phone_no').style.border = '0';
            document.querySelector('#phone_no').style.borderBottom = '1px solid';
        }
    }

    //posts
    if (document.querySelector('#posts') != null) {
        var x = document.querySelector('#posts').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-posts').innerHTML = 'Vui lòng nhập số bài viết'
            document.querySelector('#invalid-posts').style.visibility = 'visible';
            document.querySelector('#posts').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-posts').innerHTML = 'ok';
            document.querySelector('#invalid-posts').style.visibility = 'hidden';
            document.querySelector('#posts').style.border = '0';
            document.querySelector('#posts').style.borderBottom = '1px solid';
        }
    }

    //level
    if (document.querySelector('#level') != null) {
        var x = document.querySelector('#level').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-level').innerHTML = 'Vui lòng nhập cấp độ'
            document.querySelector('#invalid-level').style.visibility = 'visible';
            document.querySelector('#level').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-level').innerHTML = 'ok';
            document.querySelector('#invalid-level').style.visibility = 'hidden';
            document.querySelector('#level').style.border = '0';
            document.querySelector('#level').style.borderBottom = '1px solid';
        }
    }

    //b_account_no
    if (document.querySelector('#b_account_no') != null) {
        var x = document.querySelector('#b_account_no').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-bank').innerHTML = 'Vui lòng nhập số tài khoản'
            document.querySelector('#invalid-bank').style.visibility = 'visible';
            document.querySelector('#b_account_no').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-bank').innerHTML = 'ok';
            document.querySelector('#invalid-bank').style.visibility = 'hidden';
            document.querySelector('#b_account_no').style.border = '0';
            document.querySelector('#b_account_no').style.borderBottom = '1px solid';
        }
    }

    return check;
}

function editAuthor() {
    var check = true;

    //old_pass
    if (document.querySelector('#old_password').getAttribute("disabled") != "1") {
        var x = document.querySelector('#old_password').value;
        var BTCQPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-old-pass').innerHTML = 'Vui lòng nhập mật khẩu cũ'
            document.querySelector('#invalid-old-pass').style.visibility = 'visible';
            document.querySelector('#old_password').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-old-pass').innerHTML = 'ok';
            document.querySelector('#invalid-old-pass').style.visibility = 'hidden';
            document.querySelector('#old_password').style.border = '0';
            document.querySelector('#old_password').style.borderBottom = '1px solid';
        }
    }

    //pass
    if (document.querySelector('#password').getAttribute("disabled") != "1") {
        var x = document.querySelector('#password').value;
        var BTCQPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-pass').innerHTML = 'Vui lòng nhập mật khẩu mới'
            document.querySelector('#invalid-pass').style.visibility = 'visible';
            document.querySelector('#password').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQPASS.test(x) === false) {
                document.querySelector('#invalid-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
                document.querySelector('#invalid-pass').style.visibility = 'visible';
                document.querySelector('#password').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-pass').innerHTML = 'ok';
                document.querySelector('#invalid-pass').style.visibility = 'hidden';
                document.querySelector('#password').style.border = '0';
                document.querySelector('#password').style.borderBottom = '1px solid';
            }
        }
    }

    //repass
    if (document.querySelector('#re-password').getAttribute("disabled") != "1") {
        var x = document.querySelector('#re-password').value;
        var BTCQREPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-re-pass').innerHTML = 'Vui lòng nhập lại mật khẩu mới'
            document.querySelector('#invalid-re-pass').style.visibility = 'visible';
            document.querySelector('#re-password').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQREPASS.test(x) === false) {
                document.querySelector('#invalid-re-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
                document.querySelector('#invalid-re-pass').style.visibility = 'visible';
                document.querySelector('#re-password').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-re-pass').innerHTML = 'ok';
                document.querySelector('#invalid-re-pass').style.visibility = 'hidden';
                document.querySelector('#re-password').style.border = '0';
                document.querySelector('#re-password').style.borderBottom = '1px solid';
            }
        }
    }

    //pass - repass
    if (document.querySelector('#re-password').getAttribute("disabled") != "1" &&
        document.querySelector('#password').getAttribute("disabled") != "1") {
        if (document.querySelector('#password').value != document.querySelector('#re-password').value) {
            document.querySelector('#invalid-re-pass').innerHTML = 'Mật khẩu đã nhập không khớp! Hãy thử lại';
            document.querySelector('#invalid-re-pass').style.visibility = 'visible';
            document.querySelector('#re-password').style.border = '2px solid red';
            check = false;
        }
    }
    //fullname
    if (document.querySelector('#fullname').getAttribute("disabled") != "1") {
        var x = document.querySelector('#fullname').value;
        var BTCQFULL = /^[^0-9\`\~\!\@\#\$\%\^\&\*\)\(\]\[\\\;\'\,\.\/\+\-\=\_\"\}\{\|\:\?\>\<]{1,50}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-fullname').innerHTML = 'Vui lòng nhập họ tên'
            document.querySelector('#invalid-fullname').style.visibility = 'visible';
            document.querySelector('#fullname').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQFULL.test(x) === false) {
                document.querySelector('#invalid-fullname').innerHTML = 'Họ tên phải từ 1 - 50 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-fullname').style.visibility = 'visible';
                document.querySelector('#fullname').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-fullname').innerHTML = 'ok';
                document.querySelector('#invalid-fullname').style.visibility = 'hidden';
                document.querySelector('#fullname').style.border = '0';
                document.querySelector('#fullname').style.borderBottom = '1px solid';
            }
        }
    }

    //email
    if (document.querySelector('#email').getAttribute("disabled") != "1") {
        var x = document.querySelector('#email').value;
        var BTCQEMAIL = /^[^\`\~\!\#\$\%\^\&\*\)\(\]\[\\\;\'\,\/\+\-\=\"\}\{\|\:\?\>\<]{7,100}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-email').innerHTML = 'Vui lòng nhập email'
            document.querySelector('#invalid-email').style.visibility = 'visible';
            document.querySelector('#email').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQEMAIL.test(x) === false) {
                document.querySelector('#invalid-email').innerHTML = 'Email phải từ 7 - 100 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-email').style.visibility = 'visible';
                document.querySelector('#email').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-email').innerHTML = 'ok';
                document.querySelector('#invalid-email').style.visibility = 'hidden';
                document.querySelector('#email').style.border = '0';
                document.querySelector('#email').style.borderBottom = '1px solid';
            }
        }
    }

    //birth_day
    if (document.querySelector('#birth_day').getAttribute("disabled") != "1") {
        var x = document.querySelector('#birth_day').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-bday').innerHTML = 'Vui lòng nhập ngày sinh'
            document.querySelector('#invalid-bday').style.visibility = 'visible';
            document.querySelector('#birth_day').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-bday').innerHTML = 'ok';
            document.querySelector('#invalid-bday').style.visibility = 'hidden';
            document.querySelector('#birth_day').style.border = '0';
            document.querySelector('#birth_day').style.borderBottom = '1px solid';
        }
    }

    //address
    if (document.querySelector('#address').getAttribute("disabled") != "1") {
        var x = document.querySelector('#address').value;
        var BTCQADD = /^[^\`\~\!\@\#\$\%\^\&\*\)\(\]\[\\\;\'\+\-\=\_\"\}\{\|\:\?\>\<]{1,100}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-address').innerHTML = 'Vui lòng nhập địa chỉ'
            document.querySelector('#invalid-address').style.visibility = 'visible';
            document.querySelector('#address').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQADD.test(x) === false) {
                document.querySelector('#invalid-address').innerHTML = 'Địa chỉ phải từ 1 - 100 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-address').style.visibility = 'visible';
                document.querySelector('#address').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-address').innerHTML = 'ok';
                document.querySelector('#invalid-address').style.visibility = 'hidden';
                document.querySelector('#address').style.border = '0';
                document.querySelector('#address').style.borderBottom = '1px solid';
            }
        }
    }

    //phone_no
    if (document.querySelector('#phone_no').getAttribute("disabled") != "1") {
        var x = document.querySelector('#phone_no').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-phone').innerHTML = 'Vui lòng nhập số điện thoại'
            document.querySelector('#invalid-phone').style.visibility = 'visible';
            document.querySelector('#phone_no').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-phone').innerHTML = 'ok';
            document.querySelector('#invalid-phone').style.visibility = 'hidden';
            document.querySelector('#phone_no').style.border = '0';
            document.querySelector('#phone_no').style.borderBottom = '1px solid';
        }
    }

    //b_account_no
    if (document.querySelector('#b_account_no').getAttribute("disabled") != "1") {
        var x = document.querySelector('#b_account_no').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-bank').innerHTML = 'Vui lòng nhập số tài khoản'
            document.querySelector('#invalid-bank').style.visibility = 'visible';
            document.querySelector('#b_account_no').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-bank').innerHTML = 'ok';
            document.querySelector('#invalid-bank').style.visibility = 'hidden';
            document.querySelector('#b_account_no').style.border = '0';
            document.querySelector('#b_account_no').style.borderBottom = '1px solid';
        }
    }
    return check;
}

function platform() {
    var check = true;
    var BTCQ = /^[^\`\~\!\@\#\$\%\^\&\*\)\(\]\[\\\;\'\,\.\/\+\=\_\"\}\{\|\:\?\>\<]{2,40}$/;

    var x = document.querySelector('#platform_name').value;

    if (x === null || x === '') {
        document.querySelector('#invalid-name').innerHTML = 'Vui lòng nhập tên nền tảng'
        document.querySelector('#invalid-name').style.visibility = 'visible';
        document.querySelector('#platform_name').style.border = '2px solid red';
        check = false;
    } else {
        if (BTCQ.test(x) === false) {
            document.querySelector('#invalid-name').innerHTML = 'Tên nền tảng phải từ 2 - 40 ký tự, không chứa ký tự đặc biệt.'
            document.querySelector('#invalid-name').style.visibility = 'visible';
            document.querySelector('#platform_name').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-name').innerHTML = 'ok';
            document.querySelector('#invalid-name').style.visibility = 'hidden';
            document.querySelector('#platform_name').style.border = '0';
            document.querySelector('#platform_name').style.borderBottom = '1px solid';
        }
    }
    return check;
}

function category() {
    var check = true;
    var BTCQ = /^[^\`\~\^\*\]\[\\\;\,\/\=\}\{\|]{2,50}$/;
    var x = document.querySelector('#category_name').value;

    if (x === null || x === '') {
        document.querySelector('#invalid-name').innerHTML = 'Vui lòng nhập tên thể loại'
        document.querySelector('#invalid-name').style.visibility = 'visible';
        document.querySelector('#category_name').style.border = '2px solid red';
        check = false;
    } else {
        if (BTCQ.test(x) === false) {
            document.querySelector('#invalid-name').innerHTML = 'Tên thể loại phải từ 2 - 50 ký tự, không chứa ^ * [ ] \ / ; , = { } | ` ~'
            document.querySelector('#invalid-name').style.visibility = 'visible';
            document.querySelector('#category_name').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-name').innerHTML = 'ok';
            document.querySelector('#invalid-name').style.visibility = 'hidden';
            document.querySelector('#category_name').style.border = '0';
            document.querySelector('#category_name').style.borderBottom = '1px solid';
        }
    }

    var BTCQF = /^[^\`\~\^\*\]\[\\\;\,\/\=\}\{\|]{2,100}$/;
    var x = document.querySelector('#category_fullname').value;

    if (x === null || x === '') {
        document.querySelector('#invalid-fullname').innerHTML = 'Vui lòng nhập tên đầy đủ của thể loại'
        document.querySelector('#invalid-fullname').style.visibility = 'visible';
        document.querySelector('#category_fullname').style.border = '2px solid red';
        check = false;
    } else {
        if (BTCQF.test(x) === false) {
            document.querySelector('#invalid-fullname').innerHTML = 'Tên đầy đủ phải từ 2 - 100 ký tự, không chứa ^ * [ ] \ / ; , = { } | ` ~'
            document.querySelector('#invalid-fullname').style.visibility = 'visible';
            document.querySelector('#category_fullname').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-fullname').innerHTML = 'ok';
            document.querySelector('#invalid-fullname').style.visibility = 'hidden';
            document.querySelector('#category_fullname').style.border = '0';
            document.querySelector('#category_fullname').style.borderBottom = '1px solid';
        }
    }

    return check;
}

function login() { // css moi
    var check = true;
    var x = document.querySelector('#username').value;

    if (x === null || x === '') {
        document.querySelector('#invalid-name').innerHTML = 'Vui lòng nhập tên đăng nhập'
        document.querySelector('#invalid-name').style.display = 'block';
        check = false;
    } else {
        document.querySelector('#invalid-name').innerHTML = 'ok';
        document.querySelector('#invalid-name').style.display = 'none';
    }

    var x = document.querySelector('#pass').value;

    if (x === null || x === '') {
        document.querySelector('#invalid-pass').innerHTML = 'Vui lòng nhập mật khẩu'
        document.querySelector('#invalid-pass').style.display = 'block';
        check = false;
    } else {
        document.querySelector('#invalid-pass').innerHTML = 'ok';
        document.querySelector('#invalid-pass').style.display = 'none';
    }

    return check;
}

// function login() { // css cu
//     var check = true;
//     var x = document.querySelector('#username').value;

//     if (x === null || x === '') {
//         document.querySelector('#invalid-name').innerHTML = 'Vui lòng nhập tên đăng nhập'
//         document.querySelector('#invalid-name').style.visibility = 'visible';
//         document.querySelector('#username').style.border = '2px solid red';
//         check = false;
//     } else {
//         document.querySelector('#invalid-name').innerHTML = 'ok';
//         document.querySelector('#invalid-name').style.visibility = 'hidden';
//         document.querySelector('#username').style.border = '0';
//         document.querySelector('#username').style.borderBottom = '1px solid';
//     }

//     var x = document.querySelector('#pass').value;

//     if (x === null || x === '') {
//         document.querySelector('#invalid-pass').innerHTML = 'Vui lòng nhập mật khẩu'
//         document.querySelector('#invalid-pass').style.visibility = 'visible';
//         document.querySelector('#pass').style.border = '2px solid red';
//         check = false;
//     } else {
//         document.querySelector('#invalid-pass').innerHTML = 'ok';
//         document.querySelector('#invalid-pass').style.visibility = 'hidden';
//         document.querySelector('#pass').style.border = '0';
//         document.querySelector('#pass').style.borderBottom = '1px solid';
//     }

//     return check;
// }

function resetPass() {
    var check = true;
    //pass
    var x = document.querySelector('#password').value;
    var BTCQPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

    if (x === null || x === '') {
        document.querySelector('#invalid-pass').innerHTML = 'Vui lòng nhập mật khẩu mới'
        document.querySelector('#invalid-pass').style.display = 'block';
        check = false;
    } else {
        if (BTCQPASS.test(x) === false) {
            document.querySelector('#invalid-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
            document.querySelector('#invalid-pass').style.display = 'block';
            check = false;
        } else {
            document.querySelector('#invalid-pass').innerHTML = 'ok';
            document.querySelector('#invalid-pass').style.display = 'none';
        }
    }


    //repass
    var x = document.querySelector('#re-password').value;
    var BTCQREPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

    if (x === null || x === '') {
        document.querySelector('#invalid-re-pass').innerHTML = 'Vui lòng nhập lại mật khẩu mới'
        document.querySelector('#invalid-re-pass').style.display = 'block';
        check = false;
    } else {
        if (BTCQREPASS.test(x) === false) {
            document.querySelector('#invalid-re-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
            document.querySelector('#invalid-re-pass').style.display = 'block';
            check = false;
        } else {
            document.querySelector('#invalid-re-pass').innerHTML = 'ok';
            document.querySelector('#invalid-re-pass').style.display = 'none';
        }
    }

    //pass - repass
    if (document.querySelector('#password').value != document.querySelector('#re-password').value) {
        document.querySelector('#invalid-re-pass').innerHTML = 'Mật khẩu đã nhập không khớp! Hãy thử lại';
        document.querySelector('#invalid-re-pass').style.display = 'block';
        check = false;
    }

    return check;
}

function news() {
    var check = true;
    var x = document.querySelector('#header').value;
    var BTCQH = /^[^\`\~\^\\\/\|]{3,128}$/;

    if (x === null || x === '') {
        document.querySelector('#invalid-header').innerHTML = 'Vui lòng nhập tiêu đề bài viết'
        document.querySelector('#invalid-header').style.visibility = 'visible';
        document.querySelector('#header').style.border = '2px solid red';
        check = false;
    } else {
        if (BTCQH.test(x) === false) {
            document.querySelector('#invalid-header').innerHTML = 'Tiêu đề phải từ 3 đến 128 ký tự, không chứa các ký tự ` ~ ^ \ / |'
            document.querySelector('#invalid-header').style.visibility = 'visible';
            document.querySelector('#header').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-header').innerHTML = 'ok';
            document.querySelector('#invalid-header').style.visibility = 'hidden';
            document.querySelector('#header').style.border = '0';
            document.querySelector('#header').style.borderBottom = '1px solid';
        }
    }

    var x = document.querySelector('#content').value;
    if (x === null || x === '') {
        document.querySelector('#invalid-content').innerHTML = 'Vui lòng nhập nội dung bài viết'
        document.querySelector('#invalid-content').style.visibility = 'visible';
        document.querySelector('#content').style.border = '2px solid red';
        check = false;
    } else {
        document.querySelector('#invalid-content').innerHTML = 'ok';
        document.querySelector('#invalid-content').style.visibility = 'hidden';
        document.querySelector('#content').style.border = '0';
        document.querySelector('#content').style.borderBottom = '1px solid';
    }

    return check;
}

function viewer() {
    var check = true;
    //username
    if (document.querySelector('#username') != null) {
        var x = document.querySelector('#username').value;
        var BTCQUSER = /^[A-Za-z0-9]{2,20}$/;
        if (x === null || x === '') {
            document.querySelector('#invalid-username').innerHTML = 'Vui lòng nhập tài khoản'
            document.querySelector('#invalid-username').style.visibility = 'visible';
            document.querySelector('#username').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQUSER.test(x) === false) {
                document.querySelector('#invalid-username').innerHTML = 'Tài khoản phải từ 2 - 20 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-username').style.visibility = 'visible';
                document.querySelector('#username').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-username').innerHTML = 'ok';
                document.querySelector('#invalid-username').style.visibility = 'hidden';
                document.querySelector('#username').style.border = '0';
                document.querySelector('#username').style.borderBottom = '1px solid';
            }
        }
    }

    //pass
    if (document.querySelector('#password') != null) {
        var x = document.querySelector('#password').value;
        var BTCQPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-pass').innerHTML = 'Vui lòng nhập mật khẩu'
            document.querySelector('#invalid-pass').style.visibility = 'visible';
            document.querySelector('#password').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQPASS.test(x) === false) {
                document.querySelector('#invalid-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
                document.querySelector('#invalid-pass').style.visibility = 'visible';
                document.querySelector('#password').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-pass').innerHTML = 'ok';
                document.querySelector('#invalid-pass').style.visibility = 'hidden';
                document.querySelector('#password').style.border = '0';
                document.querySelector('#password').style.borderBottom = '1px solid';
            }
        }
    }

    //repass
    if (document.querySelector('#re-password') != null) {
        var x = document.querySelector('#re-password').value;
        var BTCQREPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-re-pass').innerHTML = 'Vui lòng nhập lại mật khẩu'
            document.querySelector('#invalid-re-pass').style.visibility = 'visible';
            document.querySelector('#re-password').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQREPASS.test(x) === false) {
                document.querySelector('#invalid-re-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
                document.querySelector('#invalid-re-pass').style.visibility = 'visible';
                document.querySelector('#re-password').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-re-pass').innerHTML = 'ok';
                document.querySelector('#invalid-re-pass').style.visibility = 'hidden';
                document.querySelector('#re-password').style.border = '0';
                document.querySelector('#re-password').style.borderBottom = '1px solid';
            }
        }
    }

    //pass - repass
    if (document.querySelector('#password').value != document.querySelector('#re-password').value) {
        document.querySelector('#invalid-re-pass').innerHTML = 'Mật khẩu đã nhập không khớp! Hãy thử lại';
        document.querySelector('#invalid-re-pass').style.visibility = 'visible';
        document.querySelector('#re-password').style.border = '2px solid red';
        check = false;
    }
    //fullname
    if (document.querySelector('#fullname') != null) {
        var x = document.querySelector('#fullname').value;
        var BTCQFULL = /^[^0-9\`\~\!\@\#\$\%\^\&\*\)\(\]\[\\\;\'\,\.\/\+\-\=\_\"\}\{\|\:\?\>\<]{1,50}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-fullname').innerHTML = 'Vui lòng nhập họ tên'
            document.querySelector('#invalid-fullname').style.visibility = 'visible';
            document.querySelector('#fullname').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQFULL.test(x) === false) {
                document.querySelector('#invalid-fullname').innerHTML = 'Họ tên phải từ 1 - 50 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-fullname').style.visibility = 'visible';
                document.querySelector('#fullname').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-fullname').innerHTML = 'ok';
                document.querySelector('#invalid-fullname').style.visibility = 'hidden';
                document.querySelector('#fullname').style.border = '0';
                document.querySelector('#fullname').style.borderBottom = '1px solid';
            }
        }
    }

    //email
    if (document.querySelector('#email') != null) {
        var x = document.querySelector('#email').value;
        var BTCQEMAIL = /^[^\`\~\!\#\$\%\^\&\*\)\(\]\[\\\;\'\,\/\+\-\=\"\}\{\|\:\?\>\<]{7,100}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-email').innerHTML = 'Vui lòng nhập email'
            document.querySelector('#invalid-email').style.visibility = 'visible';
            document.querySelector('#email').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQEMAIL.test(x) === false) {
                document.querySelector('#invalid-email').innerHTML = 'Email phải từ 7 - 100 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-email').style.visibility = 'visible';
                document.querySelector('#email').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-email').innerHTML = 'ok';
                document.querySelector('#invalid-email').style.visibility = 'hidden';
                document.querySelector('#email').style.border = '0';
                document.querySelector('#email').style.borderBottom = '1px solid';
            }
        }
    }

    //birth_day
    if (document.querySelector('#birth_day') != null) {
        var x = document.querySelector('#birth_day').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-bday').innerHTML = 'Vui lòng nhập ngày sinh'
            document.querySelector('#invalid-bday').style.visibility = 'visible';
            document.querySelector('#birth_day').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-bday').innerHTML = 'ok';
            document.querySelector('#invalid-bday').style.visibility = 'hidden';
            document.querySelector('#birth_day').style.border = '0';
            document.querySelector('#birth_day').style.borderBottom = '1px solid';
        }
    }

    return check;
}

function editViewer() {
    var check = true;

    //old_pass
    if (document.querySelector('#old_password').getAttribute("disabled") != "1") {
        var x = document.querySelector('#old_password').value;
        var BTCQPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-old-pass').innerHTML = 'Vui lòng nhập mật khẩu cũ'
            document.querySelector('#invalid-old-pass').style.visibility = 'visible';
            document.querySelector('#old_password').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-old-pass').innerHTML = 'ok';
            document.querySelector('#invalid-old-pass').style.visibility = 'hidden';
            document.querySelector('#old_password').style.border = '0';
            document.querySelector('#old_password').style.borderBottom = '1px solid';
        }
    }

    //pass
    if (document.querySelector('#password').getAttribute("disabled") != "1") {
        var x = document.querySelector('#password').value;
        var BTCQPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-pass').innerHTML = 'Vui lòng nhập mật khẩu mới'
            document.querySelector('#invalid-pass').style.visibility = 'visible';
            document.querySelector('#password').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQPASS.test(x) === false) {
                document.querySelector('#invalid-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
                document.querySelector('#invalid-pass').style.visibility = 'visible';
                document.querySelector('#password').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-pass').innerHTML = 'ok';
                document.querySelector('#invalid-pass').style.visibility = 'hidden';
                document.querySelector('#password').style.border = '0';
                document.querySelector('#password').style.borderBottom = '1px solid';
            }
        }
    }

    //repass
    if (document.querySelector('#re-password').getAttribute("disabled") != "1") {
        var x = document.querySelector('#re-password').value;
        var BTCQREPASS = /^(?=.*\d)(?=.*[a-zA-Z])[A-Za-z0-9!@#\$%\^\&*\)\(]{6,32}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-re-pass').innerHTML = 'Vui lòng nhập lại mật khẩu mới'
            document.querySelector('#invalid-re-pass').style.visibility = 'visible';
            document.querySelector('#re-password').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQREPASS.test(x) === false) {
                document.querySelector('#invalid-re-pass').innerHTML = 'Có cả chữ và số, có thể có ký tự đặc biệt, từ 6 - 32 ký tự';
                document.querySelector('#invalid-re-pass').style.visibility = 'visible';
                document.querySelector('#re-password').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-re-pass').innerHTML = 'ok';
                document.querySelector('#invalid-re-pass').style.visibility = 'hidden';
                document.querySelector('#re-password').style.border = '0';
                document.querySelector('#re-password').style.borderBottom = '1px solid';
            }
        }
    }

    //pass - repass
    if (document.querySelector('#re-password').getAttribute("disabled") != "1" &&
        document.querySelector('#password').getAttribute("disabled") != "1") {
        if (document.querySelector('#password').value != document.querySelector('#re-password').value) {
            document.querySelector('#invalid-re-pass').innerHTML = 'Mật khẩu đã nhập không khớp! Hãy thử lại';
            document.querySelector('#invalid-re-pass').style.visibility = 'visible';
            document.querySelector('#re-password').style.border = '2px solid red';
            check = false;
        }
    }
    //fullname
    if (document.querySelector('#fullname').getAttribute("disabled") != "1") {
        var x = document.querySelector('#fullname').value;
        var BTCQFULL = /^[^0-9\`\~\!\@\#\$\%\^\&\*\)\(\]\[\\\;\'\,\.\/\+\-\=\_\"\}\{\|\:\?\>\<]{1,50}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-fullname').innerHTML = 'Vui lòng nhập họ tên'
            document.querySelector('#invalid-fullname').style.visibility = 'visible';
            document.querySelector('#fullname').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQFULL.test(x) === false) {
                document.querySelector('#invalid-fullname').innerHTML = 'Họ tên phải từ 1 - 50 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-fullname').style.visibility = 'visible';
                document.querySelector('#fullname').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-fullname').innerHTML = 'ok';
                document.querySelector('#invalid-fullname').style.visibility = 'hidden';
                document.querySelector('#fullname').style.border = '0';
                document.querySelector('#fullname').style.borderBottom = '1px solid';
            }
        }
    }

    //email
    if (document.querySelector('#email').getAttribute("disabled") != "1") {
        var x = document.querySelector('#email').value;
        var BTCQEMAIL = /^[^\`\~\!\#\$\%\^\&\*\)\(\]\[\\\;\'\,\/\+\-\=\"\}\{\|\:\?\>\<]{7,100}$/;

        if (x === null || x === '') {
            document.querySelector('#invalid-email').innerHTML = 'Vui lòng nhập email'
            document.querySelector('#invalid-email').style.visibility = 'visible';
            document.querySelector('#email').style.border = '2px solid red';
            check = false;
        } else {
            if (BTCQEMAIL.test(x) === false) {
                document.querySelector('#invalid-email').innerHTML = 'Email phải từ 7 - 100 ký tự, không chứa ký tự đặc biệt';
                document.querySelector('#invalid-email').style.visibility = 'visible';
                document.querySelector('#email').style.border = '2px solid red';
                check = false;
            } else {
                document.querySelector('#invalid-email').innerHTML = 'ok';
                document.querySelector('#invalid-email').style.visibility = 'hidden';
                document.querySelector('#email').style.border = '0';
                document.querySelector('#email').style.borderBottom = '1px solid';
            }
        }
    }

    //birth_day
    if (document.querySelector('#birth_day').getAttribute("disabled") != "1") {
        var x = document.querySelector('#birth_day').value;

        if (x === null || x === '') {
            document.querySelector('#invalid-bday').innerHTML = 'Vui lòng nhập ngày sinh'
            document.querySelector('#invalid-bday').style.visibility = 'visible';
            document.querySelector('#birth_day').style.border = '2px solid red';
            check = false;
        } else {
            document.querySelector('#invalid-bday').innerHTML = 'ok';
            document.querySelector('#invalid-bday').style.visibility = 'hidden';
            document.querySelector('#birth_day').style.border = '0';
            document.querySelector('#birth_day').style.borderBottom = '1px solid';
        }
    }

    return check;
}