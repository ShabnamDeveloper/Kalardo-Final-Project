<div>
    <div x-show="openTab === 3">
        <div>
            <div>
                <div>
                    <label for="basePrice">قیمت
                        پایه</label>
                    <div>
                        <div>
                            <input type="text" name="" id="basePrice" placeholder="100000"/>
                            <span>تومان</span>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div>
                    <div>
                        <input type="checkbox" name="" id="freePrice"/>
                        <label for="freePrice">هزینه ارسال
                            رایگان</label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <label for="basePrice">میزان تخفیف</label>
                    <div>
                        <input type="text" name="" id="basePrice" placeholder="15000"/>

                        <select name="" id="">
                            <option value="1">تومان</option>
                            <option value="2">ریال</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="discount">زمان تخفیف</label>
                    <div>
                        <div>
                            <input type="text" name="" id="discount" placeholder="زمان شروع" />
                            <i></i>
                        </div>

                        <div>
                            <input type="text" name="" id="discount" placeholder="زمان پایان" />
                            <i></i>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                 <div>

                    <div>
                        <input type="checkbox" name="" id="special" />
                        <label for="special">فرش ویژه</label>
                    </div>

                    <div>
                        <div>
                            <input type="checkbox" name="" id="timer" />
                            <label for="timer">نمایش زمان سنج</label>
                        </div>
                    </div>

                    <div>
                        <div >
                            <input type="checkbox" name="" id="oneTimeDiscount" />
                            <label for="oneTimeDiscount" >یکبار تخفیف برای هر کاربر</label>
                        </div>
                    </div>

                    <div>
                        <div >
                            <input type="checkbox" name="" id="ipDiscount"/>
                            <label for="ipDiscount">یکبار تخفیف برای هر IP</label>
                        </div>
                    </div>
            </div>

            <div>
                <div>
                    <p>سقف تعداد سهمیه برای هر کاربر</p>
                    <input type="text" name="" id="maxsection" placeholder="2"/>
                </div>

                <div>
                    <div>
                        <input type="checkbox" name="" id="timer"/>
                        <p>
                            فروش سهمیه ای برای دسته کاربران
                        </p>
                    </div>

                    <div>
                        <select class="group" id="userCategory">
                            <option value="1">کارمندان</option>
                            <option value="2">فروشندگان</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
