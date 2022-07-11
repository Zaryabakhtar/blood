"use strict";
// Class definition
var DonorModule = function() {
    var donorList = function(donnorURL) {
        var table = $('.kt-datatable');
        var tableUrl = table.attr('data-url');
        var datatable = $('.kt-datatable').KTDatatable({
          // datasource definition
          data: {
              type: 'remote',
              source: {
                  read: {
                      url: tableUrl,
                      // sample custom headers
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      method: 'GET',
                      map: function(raw) {
                          // sample data mapping
                          var dataSet = raw;
                          if (typeof raw.data !== 'undefined') {
                              dataSet = raw.data;
                          }
                          return dataSet;
                      },
                  },
              },
              pageSize: [10 , 25, 50],
              serverPaging: false,
              serverFiltering: true,
              serverSorting: true,
          },

          // layout definition
          layout: {
              scroll: false,
              footer: false,
          },

          // column sorting
          sortable: false,

          pagination: false,

          search: {
              input: $('#generalSearch'),
          },

        // columns definition
        columns: [{
            field: 'sr_no',
            title: '#',
            sortable: 'asc',
            width: 30,
            type: 'number',
            selector: false,
            textAlign: 'left',
        },
        {
            field: 'donnor_name',
            title: 'Name',
        },
        {
            field: 'donnor_phone',
            title: 'Phone No.',
        },
        {
            field: 'blood_group_code',
            title: 'Blood Group',
        },
        {
            field: 'donnor_gender',
            title: 'Gender',
            overflow: 'visible',
            autoHide: true,
        },
        {
            field: 'last_blood_donation',
            title: 'Last Donation',
            type: 'date',
            format: 'MM/DD/YYYY'
        },
        
        {
            field: 'donnor_visits',
            title: 'Visits',
            autoHide: false,
        }, 
        {
            field: 'Actions',
            title: 'Actions',
            sortable: false,
            width: 110,
            overflow: 'hidden',
            autoHide: false,
            textAlign: 'right',
            template: function(dataSet) {
                return '\
            <a href="'+donnorURL+'/profile/'+ dataSet.donnor_id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                <i class="flaticon2-user"></i>\
            </a>\
            <a href="'+donnorURL+'/edit/'+ dataSet.donnor_id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                <i class="flaticon2-paper"></i>\
            </a>\
            <a href="javascript;" data-url="'+donnorURL+'/destroy/'+ dataSet.donnor_id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm btn-delete-record" title="Delete">\
                <i class="flaticon2-trash"></i>\
            </a>\
            ';
            },
        }],
      });

        $('#kt_form_group').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'group');
        });

        $('#kt_form_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_form_group').selectpicker();
        
        $('a.btn-delete-record').on('click' , function(e){
            e.preventDefault();
            var url = $(this).attr('href'); 
            alert(url);
        });
    };

    var handelDeletion = function(){
        $(document).on('click' , '.btn-delete-record', function(e){
            e.preventDefault();
            var thix = $(this);
            var url = thix.data('url');
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: url,
                        method: 'POST',
                        cache: false,
                        data : {},
                        beforeSend: function(){
                            thix.prop('disabled',true);
                        },
                        success: function(response){
                            if(response.status == 'success'){
                                thix.parents("tr").remove();
                                swal.fire('Deleted!', '', 'success');
                            }else{
                                swal.fire(response.message, '', 'success');
                            }
                        },
                        error:function(){
                            thix.prop('disabled',false);
                            swal.fire('Something went wrong! Try Again.', '', 'error');
                        }
                    });
                }
            });
        });
    }

  return {
      // public functions
      init: function() {
        var donnorURL = DONNOR_URL;
        donorList(donnorURL);
        handelDeletion();
      },
    };
}();
jQuery(document).ready(function() {
    DonorModule.init();
});
