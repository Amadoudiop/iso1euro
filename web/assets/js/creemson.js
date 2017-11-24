// $(function() {
//     console.log('creemson.js to the rescue');
//
//     /**
//      * Add or Remove page from section
//      */
//     $('#test_elibilility').submit(function(e){
//         e.preventDefault()
//
//         var formData = $(this).serializeArray()
//         console.log(formData);
//         $.ajax({
//             url: Routing.generate('eligibility'),
//             type:'POST',
//             data:'formData='+formData,
//             success: function(state){
//                 console.log(state);
//                 //location.reload()
//             }
//         })
//     })
// })