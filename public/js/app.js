!function(t){var e,r=t();t.fn.sortable=function(a){var i=String(a);return a=t.extend({connectWith:!1,placeholderClass:""},a),this.each((function(){if(/^enable|disable|destroy$/.test(i)){var n=t(this).children(t(this).data("items")).attr("draggable","enable"==i);"destroy"==i&&n.add(this).removeData("connectWith items").off("dragstart.h5s dragend.h5s selectstart.h5s dragover.h5s dragenter.h5s drop.h5s")}else{var s,d,o,h=t(this).children(a.items),c=t("<"+(/^ul|ol$/i.test(this.tagName)?"li":/^tbody$/i.test(this.tagName)?"tr":"div")+' class="sortable-placeholder '+a.placeholderClass+'">').html("&nbsp;");h.find(a.handle).mousedown((function(){s=!0})).mouseup((function(){s=!1})),t(this).data("items",a.items),r=r.add(c),a.connectWith&&t(a.connectWith).add(this).data("connectWith",a.connectWith),h.attr("draggable","true").on("dragstart.h5s",(function(r){if(a.handle&&!s)return!1;s=!1;var i=r.originalEvent.dataTransfer;i.effectAllowed="move",i.setData("Text","dummy"),o=(e=t(this)).addClass("sortable-dragging").index(),d=e.parent()})).on("dragend.h5s",(function(){e&&(e.removeClass("sortable-dragging").show(),r.detach(),o!=e.index()&&e.parent().trigger("sortupdate",{item:e}),e.parent().is(d)||e.parent().trigger("sortconnect",{item:e}),e=null)})).not("a[href], img").on("selectstart.h5s",(function(){return this.dragDrop&&this.dragDrop(),!1})).end().add([this,c]).on("dragover.h5s dragenter.h5s drop.h5s",(function(i){return!h.is(e)&&a.connectWith!==t(e).parent().data("connectWith")||("drop"==i.type?(i.stopPropagation(),r.filter(":visible").after(e),e.trigger("dragend.h5s"),!1):(i.preventDefault(),i.originalEvent.dataTransfer.dropEffect="move",h.is(this)?((a.forcePlaceholderHeight||a.forcePlaceholderSize)&&c.height(e.outerHeight()),(a.forcePlaceholderWidth||a.forcePlaceholderSize)&&c.width(e.outerWidth()),e.hide(),t(this)[c.index()<t(this).index()?"after":"before"](c),r.not(c).detach()):r.is(this)||t(this).children(a.items).length||(r.detach(),t(this).append(c)),!1))}))}}))}}(jQuery);