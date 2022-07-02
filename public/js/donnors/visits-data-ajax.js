"use strict";
// Class definition
var DonorModule = function() {
    var donorList = function(visitURL = "") {
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
              pageSize: 10,
              serverPaging: false,
              serverFiltering: false,
              serverSorting: false,
          },

          // layout definition
          layout: {
              scroll: false,
              footer: false,
          },

          // column sorting
          sortable: false,

          pagination: true,

          search: {
              input: $('#generalSearch'),
          },

        // columns definition
        columns: [{
            field: 'id',
            title: '#',
            sortable: 'asc',
            width: 30,
            type: 'number',
            selector: false,
            textAlign: 'left',
        },
        {
            field: 'visit_date',
            title: 'Visit Date',
            type: 'date',
            format: 'MM/DD/YYYY'
        }, 
        {
            field: 'donnor_name',
            title: 'Name',
            type: 'date',
            format: 'MM/DD/YYYY'
        }, 
        {
            field: 'visit_ago',
            title: 'Last Visit'
        }, 
        {
            field: 'Actions',
            title: 'Actions',
            sortable: false,
            width: 110,
            overflow: 'visible',
            autoHide: false,
            textAlign: 'right',
            template: function(dataSet) {
                return '\
            <a href="'+APP_URL+'/visit/edit-visit/'+ dataSet.id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                <i class="flaticon2-paper"></i>\
            </a>\
            <a href="javascript;" data-url="'+APP_URL+'/visit/destroy-visit/'+ dataSet.id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm btn-delete-record" title="Delete">\
                <i class="flaticon2-trash"></i>\
            </a>\
            ';
            },
        }],
      });

        $('#kt_form_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_form_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_form_status').selectpicker();
        
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
                                swal.fire(response.message, '', 'error');
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
        donorList();
        handelDeletion();
      },
    };
}();
jQuery(document).ready(function() {
    DonorModule.init();
});
