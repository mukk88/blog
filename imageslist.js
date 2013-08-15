    var imageoptions = {
        valueNames: [ 'name' ],
        page:3,
        plugins: [
        	[ 'paging' ,{
        		pagingClass: "topPaging",
	            innerWindow: 1,
        	    left: 2,
        	    right: 3
	        } ]
        ]
    };
    
    var featureList = new List('imagesmain', imageoptions);