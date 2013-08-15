List.prototype.plugins.paging = function(locals, options) {
    var list = this;
    var pagingList;
    var init = function() {
        options = options || {};
        pagingList = new List(list.listContainer.id, {
            listClass: options.pagingClass || 'pagination',
            item: "<li><a class='page' href='javascript:function Z(){Z=\"\"}Z()'></a></li>",
            valueNames: ['page', 'dotted'],
            searchClass: 'nosearchclass',
            sortClass: 'nosortclass'
        });
        list.on('updated', refresh);
        refresh();
        autoResize();
    };

    var refresh = function() {
        var l = list.matchingItems.length,
            index = list.i,
            page = list.page,
            pages = Math.ceil(l / page),
            currentPage = Math.ceil((index / page)),
            innerWindow = options.innerWindow || 2,
            left = options.left || options.outerWindow || 0,
            right = options.right || options.outerWindow || 0,
            right = pages - right;

        pagingList.clear();
        for (var i = 1; i <= pages; i++) {
            var className = (currentPage === i) ? "active" : "";

            //console.log(i, left, right, currentPage, (currentPage - innerWindow), (currentPage + innerWindow));

            if (is.number(i, left, right, currentPage, innerWindow)) {
                var item = pagingList.add({
                    page: i,
                    dotted: false
                })[0];
                ListJsHelpers.addClass(item.elm, className);
                addEvent(item.elm, i, page);
            } else if (is.dotted(i, left, right, currentPage, innerWindow, pagingList.size())) {
                var item = pagingList.add({
                    page: "...",
                    dotted: true
                })[0];
                ListJsHelpers.addClass(item.elm, "disabled");
            }
        }
    };

    var is = {
        number: function(i, left, right, currentPage, innerWindow) {
           return this.left(i, left) || this.right(i, right) || this.innerWindow(i, currentPage, innerWindow);
        },
        left: function(i, left) {
            return (i <= left);
        },
        right: function(i, right) {
            return (i > right);
        },
        innerWindow: function(i, currentPage, innerWindow) {
            return ( i >= (currentPage - innerWindow) && i <= (currentPage + innerWindow));
        },
        dotted: function(i, left, right, currentPage, innerWindow, currentPageItem) {
            return this.dottedLeft(i, left, right, currentPage, innerWindow)
            || (this.dottedRight(i, left, right, currentPage, innerWindow, currentPageItem));
        },
        dottedLeft: function(i, left, right, currentPage, innerWindow) {
            return ((i == (left + 1)) && !this.innerWindow(i, currentPage, innerWindow) && !this.right(i, right))
        },
        dottedRight: function(i, left, right, currentPage, innerWindow, currentPageItem) {
            if (pagingList.items[currentPageItem-1].values().dotted) {
                return false
            } else {
                return ((i == (right)) && !this.innerWindow(i, currentPage, innerWindow) && !this.right(i, right))
            }
        }
    };

    var addEvent = function(elm, i, page) {
       ListJsHelpers.addEvent(elm, 'click', function() {
           list.show((i-1)*page + 1, page);
       });
    };

    function autoResize(){
      var i, len, iframedivs, canvases, ctx;
      var width = $('#imageslist').width();
      var adjusted = width*0.57;
      iframedivs = document.getElementsByClassName("iframediv");
      for(i = 0, len = iframedivs.length;i<len;i++){
        iframedivs[i].style.height = (adjusted +"px");
      }

      canvases = document.getElementsByClassName("canvas");
      for(i = 0, len = canvases.length;i<len;i++){
        canvases[i].width = canvases[i].width;
        ctx = canvases[i].getContext("2d");

        ctx.fillStyle = "888888";
        ctx.font = "45px Helvetica";
        ctx.textAlign="center"; 
        var text = canvases[i].id;
        var left = ctx.measureText(text).width;
        ctx.fillText(text,width/2,55); 

        ctx.strokeStyle = "888888";
        ctx.beginPath();
        ctx.lineWidth=2;
        ctx.lineCap="butt";
        ctx.moveTo(0,40);
        ctx.lineTo((width-left)*0.45,40);
        ctx.moveTo(width-((width-left)*0.45),40);
        ctx.lineTo(width,40);
        ctx.stroke();
      }
    }

    init();
    return this;
};