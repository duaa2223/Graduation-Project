function hideContent(class_name){

    var x = document.getElementsByClassName(class_name);
    x.style.display="none";
}

// function loadContent(url){
//     var iframe      = document.getElementByClassName('lesson_content')[0];
//     // var url         = "student_lessons.php?lesson_name=" + encodeURIComponent(lesson_name);
//     iframe.src      = url;
//     hideContent('list');
// }
function loadLesson(lessonName, order){
    var iframe      = document.getElementsByClassName('current_lesson')[order];
    iframe.src      = 'student_lesson.php?lesson_name=' + encodeURIComponent(lessonName);
}

function what(){
    document.getElementById('demo').innerHTML = 'This is JavaScript!'
}