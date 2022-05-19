<div>
    <div class="" x-show="openTab === 1">
        <div
            class="rounded-md border border-trueGray-300 dark:border-gray-700 bg-white dark:bg-trueGray-800 dark:bg-opacity-80 p-4 flex justify-around flex-row rtl:flex-row-reverse">
            <div class="relative cursor-pointer">
                <label for="insertPictute" class="">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        <span>بارگذاری تصویر</span>
                    </div>
                </label>
                <input type="file" name="" id="insertPicture" multiple/>
            </div>
            <div id="gallary">
            </div>
        </div>

        <div>
            <div>
                <div>
                    <label for="fa-kala">عنوان کالا</label>
                    <input type="text" name="" id="fa-kala" rtl:text-ltr" />
                </div>
                <div class="w-full px-4">
                    <label for="en-kala">عنوان انگلیسی</label>
                    <input type="text" name="" id="en-kala" placeholder="Suture"/>
                </div>
            </div>

            <div>
                <div>
                    <div>
                        <label for="grouping">دسته
                            بندی</label>
                        <select class="group " id="grouping">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>

                    <a href="#" id="addOption">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <span >دسته بندی تازه</span>
                    </a>
                </div>
            </div>

            <div>
                <div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                        <span>(Esc)</span>
                    </div>
                    <div>
                        <x-modal-mega-menu></x-modal-mega-menu>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <div>
                        <label for="brand">برند</label>
                        <div>
                            <div>
                                <select class="brand" id="brand">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>

                            <a href="#" onclick="return false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 md:w-6" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>برند تازه</span>
                            </a>
                        </div>
                    </div>

                    <div class="w-full">
                        <div>
                            <label for="code">کد کالا</label>
                            <span  id="codeTooltip">
                                <i>i</i>
                            </span>
                            <div class="hidden" id="subCodetooltip">
                            </div>
                        </div>

                        <div>
                            <input type="text" name="" id="code" value="SKU-"/>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <div>
                        <label for="">ابعاد بسته های کالا</label>
                        <div>
                            <div>
                                <input type="text" placeholder="طول"/>
                            </div>
                            <div>
                                <input type="text" placeholder="عرض"/>
                            </div>
                            <div>
                                <input type="text" placeholder="ارتفاع"/>
                            </div>
                        </div>
                    </div>

                    <div class="relative w-full">
                        <label for="brand">وزن کالا با دسته بندی</label>
                        <div class="relative">
                            <input type="text"/>
                            <span>گرم</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <label>معرفی کوتاه محصول</label>
                <textarea name="" id="semiintroduction"></textarea>
            </div>

            <div>
                <label>معرفی کامل محصول</label>
                <textarea name="" id="fullintroduction"></textarea>
            </div>
        </div>
    </div>
</div>
