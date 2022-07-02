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

          pagination: false,

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
            field: 'Actions',
            title: 'Actions',
            sortable: false,
            width: 110,
            overflow: 'visible',
            autoHide: false,
            textAlign: 'right',
            template: function(dataSet) {
                return '\
            <a href="'+donnorURL+'/edit/'+ dataSet.id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                <i class="flaticon2-paper"></i>\
            </a>\
            <a href="javascript;" data-url="'+donnorURL+'/destroy/'+ dataSet.id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm btn-delete-record" title="Delete">\
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
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: url,
                method: 'POST',
                cache: false,
                data : {},
                beforeSend: function(){
                    thix.prop('disabled',true);
                },
                success: function(){
                    thix.parents("tr").remove();
                },
                error:function(){
                    thix.prop('disabled',false);
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
