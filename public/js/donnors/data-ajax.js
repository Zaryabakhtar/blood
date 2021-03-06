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
                field: 'donnor_gender',
                title: 'Gender',
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
              overflow: 'visible',
              autoHide: false,
              textAlign: 'right',
              template: function(dataSet) {
                  return '\
            <a href="'+donnorURL+'/edit/'+ dataSet.donnor_id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm" title="Edit details">\
                <i class="flaticon2-paper"></i>\
            </a>\
            <a href="'+donnorURL+'/destroy/'+ dataSet.donnor_id +'" class="btn btn-sm btn-clean btn-icon btn-icon-sm btn-delete-record" title="Delete">\
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
  return {
      // public functions
      init: function() {
        var donnorURL = DONNOR_URL;
        donorList(donnorURL);
      },
    };
}();
jQuery(document).ready(function() {
    DonorModule.init();
});
