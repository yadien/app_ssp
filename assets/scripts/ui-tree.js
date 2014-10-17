var UITree = function () {

    return {
        //main function to initiate the module
        init: function () {
            var DataSourceTree = function (options) {
                this._data  = options.data;
                this._delay = options.delay;
            };
            
            DataSource.prototype = {
                data: function (options, callback) {
                    callback({ data: options.data || this._data });
                }
            };

            
            var treeDataSource = new DataSource({
                data: [
                    { name: 'Folder 1',	type: 'folder',	id: 'F1',
                        data: [
                            { name: 'Sub Folder 1', type: 'folder',	data: [], id: 'F1F1'},
                            { name: 'Sub Folder 2', type: 'folder', id: 'F1F2',
                                data: [
                                    { name: 'sub sub folder 1', type: 'folder', data: [], id: 'F1F2F1' },
                                    { name: 'sub sub item', type: 'item', id: 'F1F2I1' }
                                ]
                            },
                            { name: 'Item in Folder 1', type: 'item', id: 'F1I1' }
                        ]
                    },
                    { name: 'Folder 2', type: 'folder', data: [], id: 'F2' },
                    { name: 'Item 1', type: 'item', id: 'I1'},
                    { name: 'Item 2', type: 'item', id: 'I2'}
                ]
            });
            
            $('#MyTree').tree({
                dataSource: treeDataSource
            });
            
            $('#tree-selected-items').on('click', function() {
                console.log("selected items: ", $('#MyTree').tree('selectedItems'));
            });
            
            $('#MyTree').on('loaded', function(evt, data) {
                console.log('tree content loaded');
            });
            
            $('#MyTree').on('opened', function(evt, data) {
                console.log('sub-folder opened: ', data);
            });
            
            $('#MyTree').on('closed', function(evt, data) {
                console.log('sub-folder closed: ', data);
            });
            
            $('#MyTree').on('selected', function(evt, data) {
                console.log('item selected: ', data);
            });
            
            
            $('#MyTree5').tree({
                dataSource: treeDataSource,
                loadingHTML: '<img src="/assets/img/input-spinner.gif"/>',
            });


            $('#MyTree2').tree({
                dataSource: treeDataSource2,
                loadingHTML: '<img src="assets/img/input-spinner.gif"/>',
            });

            $('#MyTree3').tree({
                dataSource: treeDataSource3,
                loadingHTML: '<img src="assets/img/input-spinner.gif"/>',
            });

            $('#MyTree4').tree({
                selectable: false,
                dataSource: treeDataSource4,
                loadingHTML: '<img src="/assets/img/input-spinner.gif"/>',
            });
        }

    };

}();