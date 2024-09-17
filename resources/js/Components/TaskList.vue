<script setup lang="ts"></script>
<template>
    <ul class="my-4">
        <li class="mt-4" id="1">
            <div class="flex gap-2">
                <div
                    class="w-9/12 h-12 bg-[#e0ebff] rounded-[7px] flex justify-start items-center px-3"
                >
                <span
                    id="check1"
                    class="w-7 h-7 bg-white rounded-full border border-white transition-all cursor-pointer hover:border-[#36d344] flex justify-center items-center"
                    onclick="checked(1)"
                ><i class="text-white fa fa-check"></i
                ></span>
                    <p
                        id="strike1"
                        class="strike_none text-sm ml-4 text-[#5b7a9d] font-semibold"
                    >take out the trash</p
                    >
                </div>
                <span
                    class="w-1/4 h-12 bg-[#e0ebff] rounded-[7px] flex justify-center text-sm text-[#5b7a9d] font-semibold items-center"
                >9:00 AM</span
                >
            </div>
        </li>
        <li class="mt-4" id="2">
            <div class="flex gap-2">
                <div
                    class="w-9/12 h-12 bg-[#e0ebff] rounded-[7px] flex justify-start items-center px-3"
                >
                <span
                    id="check2"
                    class="w-7 h-7 bg-white rounded-full border border-white transition-all cursor-pointer hover:border-[#36d344] flex justify-center items-center"
                    onclick="checked(2)"
                ><i class="text-white fa fa-check"></i
                ></span>
                    <p
                        id="strike2"
                        class="strike_none text-sm ml-4 text-[#5b7a9d] font-semibold"
                    >do homework
                    </p>
                </div>
                <span
                    class="w-1/4 h-12 bg-[#e0ebff] rounded-[7px] flex justify-center text-sm text-[#5b7a9d] font-semibold items-center"
                >12:00 PM</span
                >
            </div>
        </li>
        <li class="mt-4" id="3">
            <div class="flex gap-2">
                <div
                    class="w-9/12 h-12 bg-[#e0ebff] rounded-[7px] flex justify-start items-center px-3"
                >
                <span
                    id="check3"
                    class="w-7 h-7 bg-white rounded-full border border-white transition-all cursor-pointer hover:border-[#36d344] flex justify-center items-center"
                    onclick="checked(3)"
                ><i class="text-white fa fa-check"></i
                ></span>
                    <p
                        id="strike3"
                        class="strike_none text-sm ml-4 text-[#5b7a9d] font-semibold"
                    >go to grocery store</p
                    >
                </div>
                <span
                    class="w-1/4 h-12 bg-[#e0ebff] rounded-[7px] flex justify-center text-sm text-[#5b7a9d] font-semibold items-center"
                >1:00 PM</span
                >
            </div>
        </li>
        <li class="mt-4" id="4">
            <div class="flex gap-2">
                <div
                    class="w-9/12 h-12 bg-[#e0ebff] rounded-[7px] flex justify-start items-center px-3"
                >
                <span
                    id="check4"
                    class="w-7 h-7 bg-white rounded-full border border-white transition-all cursor-pointer hover:border-[#36d344] flex justify-center items-center"
                    onclick="checked(4)"
                ><i class="text-white fa fa-check"></i
                ></span>
                    <p
                        id="strike4"
                        class="strike_none text-sm ml-4 text-[#5b7a9d] font-semibold"
                    >run 5 kilometers</p
                    >
                </div>
                <span
                    class="w-1/4 h-12 bg-[#e0ebff] rounded-[7px] flex justify-center text-sm text-[#5b7a9d] font-semibold items-center"
                >4:20 PM</span
                >
            </div>
        </li>
        <li class="mt-4" id="5">
            <div class="flex gap-2">
                <div
                    class="w-9/12 h-12 bg-[#e0ebff] rounded-[7px] flex justify-start items-center px-3"
                >
                <span
                    id="check5"
                    class="w-7 h-7 bg-white rounded-full border border-white transition-all cursor-pointer hover:border-[#36d344] flex justify-center items-center"
                    onclick="checked(5)"
                ><i class="text-white fa fa-check"></i
                ></span>
                    <p
                        id="strike5"
                        class="strike_none text-sm ml-4 text-[#5b7a9d] font-semibold"
                    >load the dishwasher</p
                    >
                </div>
                <span
                    class="w-1/4 h-12 bg-[#e0ebff] rounded-[7px] flex justify-center text-sm text-[#5b7a9d] font-semibold items-center"
                >9:00 PM</span
                >
            </div>
        </li>
        <li class="mt-4" id="6">
            <div class="flex gap-2">
                <div
                    class="w-9/12 h-12 bg-[#e0ebff] rounded-[7px] flex justify-start items-center px-3"
                >
                <span
                    id="check6"
                    class="w-7 h-7 bg-white rounded-full border border-white transition-all cursor-pointer hover:border-[#36d344] flex justify-center items-center"
                    onclick="checked(6)"
                ><i class="text-white fa fa-check"></i
                ></span>
                    <p
                        id="strike6"
                        class="strike_none text-sm ml-4 text-[#5b7a9d] font-semibold"
                    >Take out the trash</p
                    >
                </div>
                <span
                    class="w-1/4 h-12 bg-[#e0ebff] rounded-[7px] flex justify-center text-sm text-[#5b7a9d] font-semibold items-center"
                >9:00 AM</span
                >
            </div>
        </li>
    </ul>
</template>
