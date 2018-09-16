 var OneSignal = OneSignal || [];
    OneSignal.push(["init", {
      appId: "6545f5d7-d609-4331-85ee-af4cde96f1a3",
      autoRegister: true, /* Set to true to automatically prompt visitors */
      subdomainName: 'teroject',   
      notifyButton: {
        enable: true, /* Set to false to hide */
        size: 'small', /* One of 'small', 'medium', or 'large' */
        theme: 'default',
        position: 'bottom-left',  /* One of 'default' (red-white) or 'inverse" (white-red) */
        prenotify: true, /* Show an icon with 1 unread message for first-time site visitors */
        showCredit: true, /* Hide the OneSignal logo */
        displayPredicate : function() {
              return OneSignal.isPushNotificationsEnabled()
                      .then(function(isPushEnabled) {
                          return !isPushEnabled;
                      });
            },
    
        text: {
            'tip.state.unsubscribed': 'فعال سازی نوتیفیکیشن تروجکت',
            'tip.state.subscribed': "شما ثبت نام شدید",
            'tip.state.blocked': "شما بلاک کردید",
            'message.prenotify': 'برای فعال سازی رایگان نوتیفیکیشن کلیک کنید',
            'message.action.subscribed': " ممنون بابت فعال سازی ",
            'message.action.resubscribed': "شما سیستم نوتیفیکیشن را فعال کرده اید",
            'message.action.unsubscribed': "دیگر پیامی دریافت نخواهید کرد",
            'dialog.main.title': 'مدیریت کنید',
            'dialog.main.button.subscribe': 'فعال سازی',
            'dialog.main.button.unsubscribe': 'غیر فعال سازی',
            'dialog.blocked.title': 'در آوردن از بلاک',
            'dialog.blocked.message': "این راهنما را دنبال کنید"
        }
      },
          promptOptions: {
        /* Change bold title, limited to 30 characters */
        siteName: 'تروجکت',
        /* Subtitle, limited to 90 characters */
        actionMessage: "این سرویس رایگان شما را در جریان جدیدترین رویدادهای تیم ها و وظایفتان قرار می دهد.",
        /* Example notification title */
        exampleNotificationTitle: 'اعلان جدید',
        /* Example notification message */
        exampleNotificationMessage: 'ساده و سبک است و مصرف اینترنت ناچیزی دارد',
        /* Text below example notification, limited to 50 characters */
        exampleNotificationCaption: 'هر زمان که بخواهید می توانید فعال کنید',
        /* Accept button text, limited to 15 characters */
        acceptButtonText: "فعال سازی",
        /* Cancel button text, limited to 15 characters */
        cancelButtonText: "نه فعلا نمیخوام"
    },
      welcomeNotification: {
        "title": "پلتفرم تروجکت",
        "message": "سرویس فعال شد ...",
        // "url": "" /* Leave commented for the notification to not open a window on Chrome and Firefox (on Safari, it opens to your webpage) */
    }
    }]);
