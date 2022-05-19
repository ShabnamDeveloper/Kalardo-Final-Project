<div>
    <div x-show="openTab === 4">
        <div>
            <div>
                <div>
                    <ul  id="warrantyList">
                        <li>
                            <div >
                                <label for="">گارانتی</label>
                                <input type="text" value="36 ماهه پایاکار بنیان طب" placeholder="خدمات گارانتی">
                            </div>

                            <div>
                                <label for="">افزایش قیمت</label>
                                <div>
                                    <input type="text" placeholder="میزان گارانتی"/>
                                    <select>
                                        <option value="1">تومان</option>
                                        <option value="2">ریال</option>
                                    </select>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <a href="#" id="addWarranty">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>
                        افزودن گارانتی
                    </span>
                </a>
            </div>

            <div>
                <div>
                    <div>
                        <div>
                            <span>نوع انتخاب</span>
                        </div>

                        <ul>
                            <li>
                                <a href="#" onclick="return false" >
                                    <button type="submit">سایز</button>
                                </a>

                                <div>
                                    <div>بزرگ، کوچک</div>
                                </div>

                                <div>
                                    <form action="" class="">
                                        <button type="submit">حذف</button>
                                    </form>
                                </div>
                            </li>

                            <li>
                                <a href="#" onclick="return false" >
                                    <button type="submit">رنگ</button>
                                </a>

                                <div>
                                    <div>
                                        <div>
                                            <span class="">سفید</span>
                                            <span></span>
                                        </div>
                                        <div>
                                            <span class="">مشکی</span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <form action="" class="">
                                        <button type="submit">حذف</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <a href="#" onclick="return false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>
                            افزودن انتخاب
                        </span>
                    </a>
                </div>
                <div>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th> انتخاب ها</th>
                                    <th>تصویر</th>
                                    <th>کد</th>
                                    <th>تعداد</th>
                                    <th>افزایش قیمت%</th>
                                    <th>میزان تخفیف%</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <div>
                                            <span>بزرگ، سفید</span>
                                            <span></span>
                                        </div>
                                    </td>

                                    <td>
                                        <div>
                                            <label for="productPic">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </label>
                                            <input type="file" name="" id="productPic"/>
                                        </div>
                                    </td>

                                    <td>
                                        <input type="text" name="" id="" placeholder="_ _" />
                                    </td>

                                    <td>
                                        <input type="text" name="" id="" value="5" placeholder="_ _" />
                                    </td>

                                    <td>
                                        <input type="text" name="" id="" placeholder="_ _" maxlength="2" />
                                    </td>

                                    <td>
                                        <input type="text" name="" id="" placeholder="_ _" maxlength="2" />
                                    </td>

                                    <td>
                                        <form action="">
                                            <button type="submit">حذف</button>
                                        </form>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
