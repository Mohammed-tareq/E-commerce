import './bootstrap';

if (layout === 'admin') {

    window.Echo.private('admins.' + adminId).notification((event) => {
        if(event.type === 'order-created'){

            let url = showNotificationRoute.replace(':id', event.order_id) + '?notify_admin=' + event.id;

            $('#pushNotification').prepend(`               
                                <a href="${url}">
                                    <div class="media">
                                        <div class="media-left align-self-center"><i
                                                    class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                        <div class="media-body">
                                            <h6 class="media-heading">${event.type}!</h6>
                                            <p class="notification-text font-small-3 text-muted">${event.user} +" " + ${event.total}</p>
                                            <small>
                                                <time class="media-meta text-muted"
                                                      datetime="${event.create_at}">
                                                </time>
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                `);

        }else{
            let url = showContactRoute + '?notify_admin=' + event.id;
            $('#pushNotification').prepend(`
             <a href="${url}">
                                            <div class="media">
                                                <div class="media-left align-self-center"><i
                                                            class="ft-plus-square icon-bg-circle bg-blue"></i></div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">${event.type}!</h6>
                                                    <p class="notification-text font-small-3 text-muted">${event.name}" with Subject: " . ${event.subject}</p>
                                                    <small>
                                                        <time class="media-meta text-muted"
                                                              datetime="${event.create_at}">
                                                        </time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
            `);

        }



        let count= Number($('#notificationCount').text());
        $('#notificationCount').text(count+1);
    })

}