(function() {
    'use strict';

    /** 投稿削除の為のコード */
    var cmds = document.getElementsByClassName('del');
    var i;

    for (i=0; i<cmds.length; i++) {
        cmds[i].addEventListener('click', function(e) {
            /** TODO */
            e.preventDefault();
            if (confirm('終わったんだ！おめでとう！')) {
                document.getElementById('form_' + this.dataset.id).submit()
            }
        });
    }
})();