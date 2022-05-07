<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">
        <section class="sidebar-wrapper">

            <a href="{{ route('admin.home') }}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>

            <section class="sidebar-part-title">بخش فروش</section>

            <a href="{{ route('admin.educational.course.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>آموزش ها</span>
            </a>
            <a href="{{ route('admin.educational.category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی</span>
            </a>
            <a href="{{ route('admin.educational.comment.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>نظرات</span>
            </a>

            <a href="{{ route('admin.educational.payment.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>پرداخت ها</span>
            </a>
           
           <a href="{{ route('admin.educational.collection.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>کالکشن ها</span>
            </a>
           
            <section class="sidebar-group-link">
                <section class="sidebar-dropdown-toggle">
                    <i class="fas fa-chart-bar icon"></i>
                    <span>تخفیف ها</span>
                    <i class="fas fa-angle-left angle"></i>
                </section>
                <section class="sidebar-dropdown">
                    <a href="{{ route('admin.educational.discount.copan') }}">کپن تخفیف</a>
                    <a href="{{ route('admin.educational.discount.commonDiscount') }}">تخفیف عمومی</a>
                    <a href="{{ route('admin.educational.discount.amazingSale') }}">فروش شگفت انگیز</a>
                </section>
            </section>


            <section class="sidebar-part-title">بخش کاربران</section>
            <a href="{{ route('admin.user.teacher.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>مدرسان</span>
            </a>


            <section class="sidebar-part-title">تیکت ها</section>
            <a href="{{ route('admin.ticket.category.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>دسته بندی تیکت ها</span>
            </a>
            <a href="{{ route('admin.ticket.new-tickets') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های جدید</span>
            </a>
            <a href="{{ route('admin.ticket.open-tickets') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های باز</span>
            </a>
            <a href="{{ route('admin.ticket.close-tickets') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تیکت های بسته</span>
            </a>



            <section class="sidebar-part-title">اطلاع رسانی</section>
            <a href="{{ route('admin.notify.email.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اعلامیه ایمیلی</span>
            </a>
            <a href="{{ route('admin.notify.sms.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>اعلامیه پیامکی</span>
            </a>



            <section class="sidebar-part-title">تنظیمات</section>
            <a href="{{ route('admin.setting.index') }}" class="sidebar-link">
                <i class="fas fa-bars"></i>
                <span>تنظیمات</span>
            </a>

        </section>
    </section>
</aside>
