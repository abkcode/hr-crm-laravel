$(document).ready(function() {
    $(".btn-view-employee").click(function() {
        var btn = $(this);
        btn.html('View <i class="fas fa-circle-notch fa-spin"></i>');

        $.ajax({
            url: "/employees/view/"+ $(this).attr('data-id'),
            success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                var employee = res.data.employee;
                var educations = res.data.educations;
                var experiences = res.data.experiences;
                btn.html('View');
                modalHTML = '<table>';
                modalHTML += '<tr><th>Name</th><td>'+employee.fname+' '+employee.lname+'</td></tr>';
                modalHTML += '<tr><th>Email</th><td>'+employee.email+'</td></tr>';
                modalHTML += '<tr><th>Phone</th><td>+'+employee.phone_code+'-'+employee.phone_number+'</td></tr>';
                modalHTML += '<tr><th>Gender</th><td>'+employee.gender+'</td></tr>';
                modalHTML += '<tr><th>Created On</th><td>'+employee.created_at+'</td></tr>';
                modalHTML += '</table>';

                modalHTML += '<h3>Educations</h3>';
                modalHTML += '<table class="table table-bordered w-100 mt-3">';
                modalHTML += '<tr><th>School Name</th><th>Degree</th><th>Field of Study</th><th>Date</th><th>Grade</th></tr>';
                for (var i = 0; i < educations.length; i++) {
                    modalHTML += '<tr>';
                    modalHTML += '<td>'+educations[i].school_name+'</td>';
                    modalHTML += '<td>'+educations[i].degree+'</td>';
                    modalHTML += '<td>'+educations[i].field_of_study+'</td>';
                    modalHTML += '<td>'+educations[i].start_month+'/'+educations[i].start_year+'</td>';
                    modalHTML += '<td>'+educations[i].grade+'</td>';
                    modalHTML += '</tr>';
                }
                modalHTML += '</table>';

                modalHTML += '<h3>Experiences</h3>';
                modalHTML += '<table class="table table-bordered w-100 mt-3">';
                modalHTML += '<tr><th>Job Title</th><th>Employment Type</th><th>Company Name</th><th>Location</th><th>Date</th></tr>';
                for (var i = 0; i < experiences.length; i++) {
                    modalHTML += '<tr>';
                    modalHTML += '<td>'+experiences[i].title+'</td>';
                    modalHTML += '<td>'+experiences[i].employment_type+'</td>';
                    modalHTML += '<td>'+experiences[i].company_name+'</td>';
                    modalHTML += '<td>'+experiences[i].location+'</td>';
                    if(experiences[i].currently_working) {
                        modalHTML += '<td>'+experiences[i].start_month+'/'+experiences[i].start_year+' - '+experiences[i].end_month+'/'+experiences[i].end_year+'</td>';
                    } else {
                        modalHTML += '<td>'+experiences[i].start_month+'/'+experiences[i].start_year+' - Present</td>';
                    }
                    modalHTML += '</tr>';
                }
                modalHTML += '</table>';

// title: "it8M53qnV4"
// employment_type: 1
// company_name: "SpYrs07hk1"
// location: "JQWPzZjjJQ"
// currently_working: 1
// start_month: 3
// start_year: 2019
// end_month: 5
// end_year: 2010

                $(".modal-view-employee").find(".modal-body").html(modalHTML);
                $(".modal-view-employee").modal("show");
            }
        });
    });
});
