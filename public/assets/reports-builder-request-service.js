define([
    'appServices',
    'CrmBaseRequestService',
    'CrmInitService'
], function() {
    appServices.factory('ReportsBuilderRequestService', [
        '$q',
        'CrmInitService',
        'CrmBaseRequestService',
        function ($q,
                  CrmInitService,
                  CrmBaseRequestService) {

            var selectedReport = null;

            return {
                setSelectedReport: function (report) {
                    selectedReport = report;
                },
                adHocReportCreate: function (data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + "AdHocReport/Create", data);
                },
                adHocReportGetById: function (id) {
                    if (selectedReport) {
                        var def = $q.defer();
                        def.resolve(selectedReport);
                        return def.promise;
                    } else {
                        return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'AdHocReport/Get?id=' + id).then(function (resopns) {
                            selectedReport = resopns.Data;
                            return selectedReport;
                        });
                    }
                },
                customReportGetById: function (id) {
                    if (selectedReport) {
                        var def = $q.defer();
                        def.resolve(selectedReport);
                        return def.promise;
                    } else {
                        return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'CustomReport/Get?id=' + id).then(function (resopns) {
                            selectedReport = resopns.Data;
                            return selectedReport;
                        });
                    }
                },
                adHocReportList: function (data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'AdHocReport/List', data);
                },
                CustomReportList: function (data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'CustomReport/List', data);
                },
                customReportGetById: function (id) {
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'CustomReport/Get?id=' + id);
                },
                CustomReportResultList: function (data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'CustomReportResult/List', data);
                },
                customReportExecuteById: function (id,data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'CustomReport/Execute?id=' + id,data);
                },
                customReportGetColumnsById: function (id) {
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'CustomReport/GetColumns?id=' + id);
                },
                deleteCustomReportResultById: function (id) {
                    return CrmBaseRequestService.baseDelete(CrmInitService.getCurrentPath().crmApi + "CustomReportResult/Delete?id=" + id);
                },
                adHocReportResultList: function (data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'AdHocReportResult/List', data);
                },
                adHocReportExsequtionById: function (id) {
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'AdHocReport/Execute?id=' + id);
                },
                adHocReportResultViewById: function (id, data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'AdHocReportResult/View',  data);
                },
                customReportResultViewById: function (id, data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'CustomReportResult/View',  data);
                },
                customReportScheduleCreate: function(data){
                    return  CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'CustomReportSchedule/Create', data);
                },
                customReportScheduleDelete: function(data){
                    return  CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'CustomReportSchedule/DeleteSchedule', data);
                },
                customReportScheduleGetById : function(id){
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'CustomReportSchedule/Get?id=' + id)
                },
                AddHocReportScheduleCreate: function(data){
                    return  CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'AddHocReportSchedule/Create', data);
                },
                AddHocReportScheduleDelete: function(data){
                    return  CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'AddHocReportSchedule/DeleteSchedule', data);
                },
                addHocReportScheduleGetById : function(id){
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'AddHocReportSchedule/Get?id=' + id)
                },
                adHocReportGetColumnsById: function (id) {
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'AddHocReportColumn/List?id=' + id);
                },
                previewReportById: function(id){
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'AdHocReport/Preview?id=' + id);
                },
                deleteReportById: function (id) {
                    return CrmBaseRequestService.baseDelete(CrmInitService.getCurrentPath().crmApi + "AdHocReport/Delete?id=" + id);
                },
                deleteReports: function (data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + "AdHocReport/Delete", data);
                },
                deleteReportResultById: function (id) {
                    return CrmBaseRequestService.baseDelete(CrmInitService.getCurrentPath().crmApi + "AdHocReportResult/Delete?id=" + id);
                },
                getReportResultById: function (id) {
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + "AdHocReportResult/Get?id=" + id);
                },
                getCustomReportResultById: function (id) {
                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + "CustomReportResult/Get?id=" + id);
                },
                getReportById: function(id, isClone){
                    isClone = !!isClone; // make isClone boolean

                    return CrmBaseRequestService.baseGet(CrmInitService.getCurrentPath().crmApi + 'AdHocReport/Get?id=' + id + "&isClone=" + isClone);
                },
                adHocReportUpdateById: function(id,data){
                    return  CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'AdHocReport/Update?id=' + id, data);
                },
                cloneReportById: function (id, data) {
                    return CrmBaseRequestService.basePost(CrmInitService.getCurrentPath().crmApi + 'AdHocReport/Clone', data);
                }
            }
        }
    ])
});
