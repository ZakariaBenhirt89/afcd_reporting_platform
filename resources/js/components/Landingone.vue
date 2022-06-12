<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
    <div class="bg-white">
        <header>
            <Popover class="relative bg-white">
                <div class="flex justify-between items-center max-w-7xl mx-auto px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="#">
                            <span class="sr-only">Isatech</span>
                            <!--?xml version="1.0" encoding="utf-8"?-->
                            <svg width="100%" height="100%" viewBox="0 0 200 54" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <path d="M0 0L200 0L200 54L0 54L0 0Z" id="path_1" class="svg-elem-1"></path>
                                    <clipPath id="mask_1">
                                        <use xlink:href="#path_1"></use>
                                    </clipPath>
                                    <image width="48" height="48" xlink:href="data:image/png;base64,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" id="img_1"></image>
                                </defs>
                                <g id="Group-3">
                                    <g id="Group-2">
                                        <path d="M0 0L200 0L200 54L0 54L0 0Z" id="Background" fill="#FFFFFF" fill-opacity="0" fill-rule="evenodd" stroke="none" class="svg-elem-2"></path>
                                        <g clip-path="url(#mask_1)">
                                            <g id="Group" transform="translate(13.548954 7.579178)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 0L5.5 0L5.5 24.4792L0 24.4792L0 0Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-3"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(22.842983 7.016678)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M8.1875 20.8333C8.96354 20.8333 9.60417 20.7708 10.1042 20.6458C10.6146 20.5208 11.026 20.349 11.3333 20.125C11.6354 19.8906 11.8438 19.6198 11.9583 19.3125C12.0833 19.0104 12.1458 18.6667 12.1458 18.2917C12.1458 17.4896 11.7708 16.8229 11.0208 16.2917C10.2708 15.7656 8.96875 15.1979 7.125 14.5833C6.33333 14.3073 5.53125 13.9896 4.72917 13.625C3.92188 13.25 3.19792 12.7865 2.5625 12.2292C1.9375 11.6771 1.42188 11.0104 1.02083 10.2292C0.614582 9.4375 0.416666 8.47395 0.416666 7.33333C0.416666 6.20833 0.625 5.19791 1.04167 4.29166C1.46875 3.375 2.07292 2.60416 2.85417 1.97916C3.63021 1.34375 4.57292 0.854164 5.6875 0.520828C6.79688 0.177078 8.04688 0 9.4375 0C11.0729 0 12.4896 0.177078 13.6875 0.520828C14.8958 0.869789 15.8854 1.26041 16.6667 1.6875L15.0833 6.04166C14.401 5.68229 13.6354 5.36979 12.7917 5.10416C11.9583 4.82812 10.9583 4.6875 9.79167 4.6875C8.46875 4.6875 7.52083 4.875 6.9375 5.25C6.35417 5.61458 6.0625 6.16666 6.0625 6.91666C6.0625 7.36458 6.16667 7.73958 6.375 8.04166C6.59375 8.34895 6.90104 8.625 7.29167 8.875C7.67708 9.125 8.125 9.35416 8.625 9.5625C9.13542 9.76041 9.69792 9.95833 10.3125 10.1667C11.5885 10.6406 12.6927 11.1042 13.625 11.5625C14.5677 12.0208 15.3542 12.5573 15.9792 13.1667C16.6042 13.7812 17.0677 14.5 17.375 15.3333C17.6771 16.1562 17.8333 17.1562 17.8333 18.3333C17.8333 20.6146 17.0313 22.3854 15.4375 23.6458C13.8385 24.9115 11.4219 25.5417 8.1875 25.5417C7.10417 25.5417 6.125 25.4688 5.25 25.3333C4.38542 25.2083 3.61458 25.0521 2.9375 24.875C2.27083 24.6823 1.69271 24.4792 1.20833 24.2708C0.71875 24.0521 0.317709 23.849 0 23.6667L1.54167 19.2917C2.27604 19.6823 3.17708 20.0365 4.25 20.3542C5.31771 20.6771 6.63021 20.8333 8.1875 20.8333L8.1875 20.8333Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-4"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(42.1007 7.579178)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M18.875 24.4792C18.6094 23.6354 18.3177 22.7656 18 21.875C17.6771 20.974 17.3646 20.0781 17.0625 19.1875L7.52083 19.1875C7.21354 20.0781 6.90104 20.974 6.58333 21.875C6.26042 22.7656 5.97916 23.6354 5.72916 24.4792L0 24.4792C0.916664 21.8438 1.78125 19.4062 2.60416 17.1667C3.4375 14.9323 4.23958 12.8281 5.02083 10.8542C5.8125 8.86979 6.58854 6.98958 7.35416 5.20833C8.13021 3.43229 8.92708 1.69791 9.75 0L15.0208 0C15.8125 1.69791 16.5938 3.43229 17.375 5.20833C18.151 6.98958 18.9375 8.86979 19.7292 10.8542C20.5208 12.8281 21.3229 14.9323 22.1458 17.1667C22.9792 19.4062 23.8542 21.8438 24.7708 24.4792L18.875 24.4792ZM12.25 5.54166C12.1354 5.89062 11.9635 6.375 11.7292 7C11.4896 7.61458 11.2188 8.32291 10.9167 9.125C10.6094 9.91666 10.2708 10.8021 9.89583 11.7708C9.53125 12.7292 9.16667 13.7396 8.79167 14.7917L15.75 14.7917C15.375 13.7396 15.0052 12.7292 14.6458 11.7708C14.2969 10.8021 13.9635 9.91666 13.6458 9.125C13.3385 8.32291 13.0677 7.61458 12.8333 7C12.5938 6.375 12.401 5.89062 12.25 5.54166L12.25 5.54166Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-5"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(67.58357 7.579178)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M20.2708 0L20.2708 4.6875L12.8958 4.6875L12.8958 24.4792L7.375 24.4792L7.375 4.6875L0 4.6875L0 0L20.2708 0Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-6"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(91.05559 7.579178)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 24.4792L0 0L16.5208 0L16.5208 4.625L5.5 4.625L5.5 9.4375L15.2917 9.4375L15.2917 13.9583L5.5 13.9583L5.5 19.8542L17.3333 19.8542L17.3333 24.4792L0 24.4792Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-7"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(111.05737 7.016678)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M12.2292 25.5417C8.23958 25.5417 5.20833 24.4375 3.125 22.2292C1.04166 20.0104 0 16.8542 0 12.7708C0 10.7604 0.3125 8.95833 0.9375 7.375C1.57291 5.78125 2.44791 4.43229 3.5625 3.33333C4.67188 2.23958 5.98958 1.41145 7.52083 0.854164C9.04688 0.286453 10.7083 0 12.5 0C13.5417 0 14.4844 0.078125 15.3333 0.229164C16.1771 0.385414 16.9219 0.557289 17.5625 0.75C18.1979 0.947914 18.7292 1.15625 19.1458 1.375C19.5729 1.58333 19.8802 1.74479 20.0625 1.85416L18.4792 6.3125C17.7292 5.91145 16.8437 5.57291 15.8333 5.29166C14.8333 5.01562 13.6979 4.875 12.4375 4.875C11.5885 4.875 10.7552 5.01562 9.9375 5.29166C9.1302 5.57291 8.41666 6.02083 7.79166 6.64583C7.16666 7.27083 6.66666 8.08333 6.29166 9.08333C5.91666 10.0729 5.72916 11.2656 5.72916 12.6667C5.72916 13.8073 5.84375 14.8698 6.08333 15.8542C6.33333 16.8281 6.73438 17.6667 7.29166 18.375C7.84375 19.0729 8.5677 19.625 9.45833 20.0417C10.3594 20.4583 11.4427 20.6667 12.7083 20.6667C13.5104 20.6667 14.2344 20.6198 14.875 20.5208C15.5104 20.4271 16.0729 20.3125 16.5625 20.1875C17.0625 20.0521 17.5 19.9062 17.875 19.75C18.25 19.5833 18.5885 19.4323 18.8958 19.2917L20.4167 23.7083C19.6354 24.1667 18.5417 24.5938 17.125 24.9792C15.7187 25.3542 14.0885 25.5417 12.2292 25.5417L12.2292 25.5417Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-8"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(134.66855 7.579178)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M14.7708 0L20.2708 0L20.2708 24.4792L14.7708 24.4792L14.7708 14.0833L5.5 14.0833L5.5 24.4792L0 24.4792L0 0L5.5 0L5.5 9.35416L14.7708 9.35416L14.7708 0Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-9"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(10.73645 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M1.02083 0L2.375 3.79166L3.70833 0L4.72917 0L2.77083 5L1.95833 5L0 0L1.02083 0Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-10"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(17.093365 41.459465)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M2.4375 5.08333C2.07292 5.08333 1.73958 5.01562 1.4375 4.875C1.14583 4.72395 0.885416 4.53125 0.666666 4.29166C0.458332 4.05729 0.291666 3.78645 0.166666 3.47916C0.0520821 3.17708 0 2.86458 0 2.54166C0 2.20833 0.0625 1.89062 0.1875 1.58333C0.3125 1.28125 0.484375 1.01041 0.708332 0.770828C0.927082 0.536453 1.1875 0.348953 1.47917 0.208328C1.78125 0.0729141 2.10938 0 2.45833 0C2.81771 0 3.14583 0.078125 3.4375 0.229164C3.73958 0.385414 4 0.578125 4.20833 0.8125C4.42708 1.05208 4.59375 1.32291 4.70833 1.625C4.83333 1.93229 4.89583 2.24479 4.89583 2.5625C4.89583 2.89583 4.83333 3.21875 4.70833 3.52083C4.58333 3.8125 4.40625 4.07812 4.1875 4.3125C3.97917 4.55208 3.71875 4.73958 3.41667 4.875C3.125 5.01562 2.79688 5.08333 2.4375 5.08333L2.4375 5.08333ZM1 2.54166C1 2.76562 1.02604 2.97916 1.08333 3.1875C1.15104 3.38541 1.25 3.55729 1.375 3.70833C1.5 3.86458 1.65104 3.98958 1.83333 4.08333C2.01042 4.16666 2.21875 4.20833 2.45833 4.20833C2.69271 4.20833 2.90104 4.16666 3.08333 4.08333C3.26042 3.98958 3.41667 3.86458 3.54167 3.70833C3.66667 3.54166 3.75521 3.36458 3.8125 3.16666C3.88021 2.95833 3.91667 2.75 3.91667 2.54166C3.91667 2.32291 3.88021 2.11458 3.8125 1.91666C3.73958 1.70833 3.64583 1.53125 3.52083 1.375C3.39583 1.22395 3.23958 1.10416 3.0625 1.02083C2.88021 0.927078 2.67708 0.875 2.45833 0.875C2.21875 0.875 2.00521 0.927078 1.8125 1.02083C1.63021 1.11979 1.47917 1.24479 1.35417 1.39583C1.23958 1.55208 1.15104 1.72916 1.08333 1.9375C1.02604 2.13541 1 2.33333 1 2.54166L1 2.54166Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-11"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(23.721981 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M4.14583 0.854164L2.5625 0.854164L2.5625 5L1.58333 5L1.58333 0.854164L0 0.854164L0 0L4.14583 0L4.14583 0.854164Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-12"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(29.90665 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 5L0 0L2.20834 0C2.44271 0 2.65625 0.0520859 2.85417 0.145836C3.04688 0.244789 3.21354 0.375 3.35417 0.541664C3.48959 0.697914 3.60417 0.869789 3.6875 1.0625C3.77084 1.26041 3.8125 1.45834 3.8125 1.66666C3.8125 1.98959 3.72917 2.28125 3.5625 2.54166C3.39584 2.80729 3.17188 3 2.89584 3.125L4.04167 5L2.95834 5L1.9375 3.33334L0.979168 3.33334L0.979168 5L0 5ZM0.979168 2.47916L2.1875 2.47916C2.28125 2.47916 2.36459 2.45834 2.4375 2.41666C2.52084 2.375 2.58854 2.32291 2.64584 2.25C2.69792 2.16666 2.73959 2.07812 2.77084 1.97916C2.8125 1.88541 2.83334 1.78125 2.83334 1.66666C2.83334 1.54166 2.8125 1.43229 2.77084 1.33334C2.72917 1.23959 2.67188 1.15625 2.60417 1.08334C2.54688 1.01562 2.47917 0.958336 2.39584 0.916664C2.3125 0.875 2.22917 0.854164 2.14584 0.854164L0.979168 0.854164L0.979168 2.47916Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-13"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(35.998596 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M3.47917 4.14584L3.47917 5L0 5L0 0L3.41667 0L3.41667 0.854164L0.979168 0.854164L0.979168 2.0625L3.08334 2.0625L3.08334 2.85416L0.979168 2.85416L0.979168 4.14584L3.47917 4.14584Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-14"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(44.426376 41.480293)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 2.47917C0 2.17709 0.0520821 1.875 0.166668 1.58334C0.276043 1.28125 0.4375 1.01562 0.645836 0.791672C0.864586 0.557297 1.13021 0.369797 1.4375 0.229172C1.73959 0.078125 2.08854 0 2.47917 0C2.9375 0 3.33334 0.104172 3.66667 0.3125C4 0.510422 4.25 0.765625 4.41667 1.08334L3.66667 1.60417C3.60938 1.46875 3.53125 1.34896 3.4375 1.25C3.33854 1.15625 3.23438 1.07812 3.125 1.02084C3.01042 0.96875 2.90104 0.927086 2.79167 0.895836C2.67708 0.869797 2.5625 0.854172 2.4375 0.854172C2.19792 0.854172 1.98959 0.90625 1.8125 1C1.63021 1.09896 1.47917 1.22917 1.35417 1.39584C1.23959 1.55209 1.15104 1.72396 1.08334 1.91667C1.02604 2.11459 1 2.3125 1 2.52084C1 2.7448 1.03125 2.95834 1.10417 3.16667C1.17188 3.36459 1.27084 3.53646 1.39584 3.6875C1.53125 3.84375 1.69271 3.96875 1.875 4.0625C2.05208 4.16146 2.25 4.20834 2.45834 4.20834C2.56771 4.20834 2.6875 4.19792 2.8125 4.16667C2.9375 4.14062 3.05208 4.09896 3.16667 4.04167C3.27604 3.97396 3.375 3.89062 3.45834 3.79167C3.55208 3.69792 3.63021 3.57813 3.6875 3.4375L4.47917 3.89584C4.40625 4.09375 4.29688 4.26042 4.14584 4.39584C3.98959 4.53646 3.82292 4.66146 3.64584 4.77084C3.46354 4.8698 3.26042 4.94792 3.04167 5C2.83334 5.04167 2.63021 5.0625 2.4375 5.0625C2.07292 5.0625 1.73959 4.98959 1.4375 4.83334C1.14584 4.6823 0.895836 4.48959 0.6875 4.25C0.479168 4.01562 0.3125 3.7448 0.1875 3.4375C0.0625 3.1198 0 2.80209 0 2.47917L0 2.47917Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-15"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(50.97871 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M4.20834 0L4.20834 5L3.22917 5L3.22917 2.875L0.979168 2.875L0.979168 5L0 5L0 0L0.979168 0L0.979168 2.02084L3.22917 2.02084L3.22917 0L4.20834 0Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-16"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(57.63403 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M3.47917 4.14584L3.47917 5L0 5L0 0L3.41667 0L3.41667 0.854164L0.979168 0.854164L0.979168 2.0625L3.08334 2.0625L3.08334 2.85416L0.979168 2.85416L0.979168 4.14584L3.47917 4.14584Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-17"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(63.27528 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M4.08333 5L4.08333 1.6875L2.79166 4.14584L2.27083 4.14584L0.979164 1.6875L0.979164 5L0 5L0 0L1.04166 0L2.52083 2.85416L4.02083 0L5.04166 0L5.04166 5L4.08333 5Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-18"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(70.77565 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 5L0 0L1 0L1 5L0 5Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-19"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(74.19862 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0.979164 1.79166L0.979164 5L0 5L0 0L0.75 0L3.35416 3.29166L3.35416 0L4.33333 0L4.33333 5L3.54166 5L0.979164 1.79166Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-20"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(83.57973 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M1.02083 0L2.375 3.79166L3.70833 0L4.72916 0L2.77083 5L1.95833 5L0 0L1.02083 0Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-21"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(90.249146 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M3.47916 4.14584L3.47916 5L0 5L0 0L3.41666 0L3.41666 0.854164L0.979164 0.854164L0.979164 2.0625L3.08333 2.0625L3.08333 2.85416L0.979164 2.85416L0.979164 4.14584L3.47916 4.14584Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-22"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(95.890396 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 5L0 0L2.20833 0C2.4427 0 2.65625 0.0520859 2.85416 0.145836C3.04688 0.244789 3.21354 0.375 3.35416 0.541664C3.48958 0.697914 3.60416 0.869789 3.6875 1.0625C3.77083 1.26041 3.8125 1.45834 3.8125 1.66666C3.8125 1.98959 3.72916 2.28125 3.5625 2.54166C3.39583 2.80729 3.17187 3 2.89583 3.125L4.04166 5L2.95833 5L1.9375 3.33334L0.979164 3.33334L0.979164 5L0 5ZM0.979164 2.47916L2.1875 2.47916C2.28125 2.47916 2.36458 2.45834 2.4375 2.41666C2.52083 2.375 2.58854 2.32291 2.64583 2.25C2.69791 2.16666 2.73958 2.07812 2.77083 1.97916C2.8125 1.88541 2.83333 1.78125 2.83333 1.66666C2.83333 1.54166 2.8125 1.43229 2.77083 1.33334C2.72916 1.23959 2.67188 1.15625 2.60416 1.08334C2.54688 1.01562 2.47916 0.958336 2.39583 0.916664C2.3125 0.875 2.22916 0.854164 2.14583 0.854164L0.979164 0.854164L0.979164 2.47916Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-23"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(101.607346 41.459465)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M3.35416 1.35416C3.32291 1.32813 3.26041 1.28645 3.16666 1.22916C3.08333 1.16145 2.97916 1.10416 2.85416 1.0625C2.72916 1.01041 2.58854 0.958328 2.4375 0.916664C2.29688 0.875 2.15104 0.854164 2 0.854164C1.73438 0.854164 1.53125 0.90625 1.39583 1C1.27083 1.09895 1.20833 1.23958 1.20833 1.41666C1.20833 1.53125 1.22916 1.61979 1.27083 1.6875C1.32291 1.76041 1.40104 1.82291 1.5 1.875C1.59375 1.91666 1.71354 1.95833 1.85416 2C1.98958 2.04166 2.15625 2.08333 2.35416 2.125C2.60416 2.19791 2.82291 2.27083 3.02083 2.35416C3.21354 2.42708 3.3802 2.51562 3.52083 2.625C3.65625 2.73958 3.76041 2.875 3.83333 3.04166C3.91666 3.19791 3.95833 3.38541 3.95833 3.60416C3.95833 3.88541 3.90625 4.11979 3.8125 4.3125C3.71354 4.49479 3.57291 4.64583 3.39583 4.77083C3.22916 4.88541 3.03125 4.96875 2.8125 5.02083C2.58854 5.07291 2.35416 5.10416 2.10416 5.10416C1.72916 5.10416 1.35416 5.04688 0.979164 4.9375C0.614578 4.8125 0.291664 4.65625 0 4.45833L0.4375 3.60416C0.479164 3.64583 0.552078 3.70313 0.666664 3.77083C0.776039 3.84375 0.90625 3.91145 1.0625 3.97916C1.21354 4.05208 1.3802 4.11458 1.5625 4.16666C1.73958 4.20833 1.92708 4.22916 2.125 4.22916C2.65104 4.22916 2.91666 4.05729 2.91666 3.70833C2.91666 3.59895 2.88541 3.51041 2.83333 3.4375C2.77604 3.36979 2.6875 3.30729 2.5625 3.25C2.44791 3.18229 2.3125 3.125 2.14583 3.08333C1.98958 3.04166 1.8177 2.99479 1.625 2.9375C1.38541 2.86979 1.17708 2.80208 1 2.72916C0.833328 2.64583 0.6875 2.55729 0.5625 2.45833C0.447914 2.34895 0.359375 2.22395 0.291664 2.08333C0.234375 1.94791 0.208328 1.78125 0.208328 1.58333C0.208328 1.32291 0.255203 1.09375 0.354164 0.895828C0.447914 0.703125 0.583328 0.541664 0.75 0.416664C0.916664 0.28125 1.10938 0.177078 1.33333 0.104164C1.55208 0.0364532 1.79166 0 2.04166 0C2.38541 0 2.70833 0.0572891 3 0.166664C3.30208 0.28125 3.5677 0.411453 3.79166 0.5625L3.35416 1.35416Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-24"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(110.807144 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 5L0 0L0.979164 0L0.979164 4.14584L3.52083 4.14584L3.52083 5L0 5Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-25"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(116.24533 41.417793)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 1.5625L0 0L1 0L1 1.5625L0 1.5625Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-26"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(118.913315 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M1.89584 0L2.77084 0L4.66667 5L3.66667 5L3.1875 3.75L1.45834 3.75L1 5L0 5L1.89584 0ZM3.02084 3.0625L2.33334 1.10416L1.60417 3.0625L3.02084 3.0625Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-27"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(125.03374 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M1.02083 0L2.375 3.79166L3.70833 0L4.72917 0L2.77083 5L1.95833 5L0 0L1.02083 0Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-28"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(131.70314 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M3.47917 4.14584L3.47917 5L0 5L0 0L3.41667 0L3.41667 0.854164L0.979172 0.854164L0.979172 2.0625L3.08334 2.0625L3.08334 2.85416L0.979172 2.85416L0.979172 4.14584L3.47917 4.14584Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-29"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(137.34438 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0.979172 1.79166L0.979172 5L0 5L0 0L0.75 0L3.35417 3.29166L3.35417 0L4.33334 0L4.33334 5L3.54167 5L0.979172 1.79166Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-30"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(144.12646 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 5L0 0L1 0L1 5L0 5Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-31"></path>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="Group" transform="translate(147.54944 41.50113)">
                                                <g id="Group">
                                                    <g id="Group">
                                                        <path d="M0 5L0 0L2.20834 0C2.44272 0 2.65625 0.0520859 2.85417 0.145836C3.04688 0.244789 3.21355 0.375 3.35417 0.541664C3.48959 0.697914 3.60417 0.869789 3.6875 1.0625C3.77084 1.26041 3.8125 1.45834 3.8125 1.66666C3.8125 1.98959 3.72917 2.28125 3.5625 2.54166C3.39584 2.80729 3.17188 3 2.89584 3.125L4.04167 5L2.95834 5L1.9375 3.33334L0.979172 3.33334L0.979172 5L0 5ZM0.979172 2.47916L2.1875 2.47916C2.28125 2.47916 2.36459 2.45834 2.4375 2.41666C2.52084 2.375 2.58855 2.32291 2.64584 2.25C2.69792 2.16666 2.73959 2.07812 2.77084 1.97916C2.8125 1.88541 2.83334 1.78125 2.83334 1.66666C2.83334 1.54166 2.8125 1.43229 2.77084 1.33334C2.72917 1.23959 2.67188 1.15625 2.60417 1.08334C2.54688 1.01562 2.47917 0.958336 2.39584 0.916664C2.3125 0.875 2.22917 0.854164 2.14584 0.854164L0.979172 0.854164L0.979172 2.47916Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-32"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                    <use xlink:href="#img_1" fill="#FFFFFF" stroke="none" transform="matrix(0.29166666 0 0 0.29166666 150 36)"></use>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="-mr-2 -my-2 md:hidden">
                        <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pink-500">
                            <span class="sr-only">Open menu</span>
                            <MenuIcon class="h-6 w-6" aria-hidden="true" />
                        </PopoverButton>
                    </div>
                    <PopoverGroup as="nav" class="hidden md:flex space-x-10">
                        <Popover class="relative" v-slot="{ open }">
                            <PopoverButton :class="[open ? 'text-gray-900' : 'text-gray-500', 'group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500']">
                                <span>Solutions et Services</span>
                                <ChevronDownIcon :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']" aria-hidden="true" />
                            </PopoverButton>

                            <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
                                <PopoverPanel class="absolute z-10 -ml-4 mt-3 transform w-screen max-w-md lg:max-w-2xl lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
                                    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                                            <a v-for="item in solutions" :key="item.name" :href="item.href" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-pink-600 text-white sm:h-12 sm:w-12">
                                                    <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                                                </div>
                                                <div class="ml-4">
                                                    <p class="text-base font-medium text-gray-900">
                                                        {{ item.name }}
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                        {{ item.description }}
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </PopoverPanel>
                            </transition>
                        </Popover>

                        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            Demande de devis
                        </a>
                        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            Les partenaires
                        </a>
                        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            À propos de nous
                        </a>
                        <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">
                            Blog
                        </a>
                    </PopoverGroup>
                    <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">

                    </div>
                </div>

                <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95" enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in" leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
                    <PopoverPanel focus class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                            <div class="pt-5 pb-6 px-5">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <svg width="100%" height="100%" viewBox="0 0 200 54" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                                            <defs>
                                                <path d="M0 0L200 0L200 54L0 54L0 0Z" id="path_1" class="svg-elem-1"></path>
                                                <clipPath id="mask_1">
                                                    <use xlink:href="#path_1"></use>
                                                </clipPath>
                                                <image width="48" height="48" xlink:href="data:image/png;base64,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" id="img_1"></image>
                                            </defs>
                                            <g id="Group-3">
                                                <g id="Group-2">
                                                    <path d="M0 0L200 0L200 54L0 54L0 0Z" id="Background" fill="#FFFFFF" fill-opacity="0" fill-rule="evenodd" stroke="none" class="svg-elem-2"></path>
                                                    <g clip-path="url(#mask_1)">
                                                        <g id="Group" transform="translate(13.548954 7.579178)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 0L5.5 0L5.5 24.4792L0 24.4792L0 0Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-3"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(22.842983 7.016678)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M8.1875 20.8333C8.96354 20.8333 9.60417 20.7708 10.1042 20.6458C10.6146 20.5208 11.026 20.349 11.3333 20.125C11.6354 19.8906 11.8438 19.6198 11.9583 19.3125C12.0833 19.0104 12.1458 18.6667 12.1458 18.2917C12.1458 17.4896 11.7708 16.8229 11.0208 16.2917C10.2708 15.7656 8.96875 15.1979 7.125 14.5833C6.33333 14.3073 5.53125 13.9896 4.72917 13.625C3.92188 13.25 3.19792 12.7865 2.5625 12.2292C1.9375 11.6771 1.42188 11.0104 1.02083 10.2292C0.614582 9.4375 0.416666 8.47395 0.416666 7.33333C0.416666 6.20833 0.625 5.19791 1.04167 4.29166C1.46875 3.375 2.07292 2.60416 2.85417 1.97916C3.63021 1.34375 4.57292 0.854164 5.6875 0.520828C6.79688 0.177078 8.04688 0 9.4375 0C11.0729 0 12.4896 0.177078 13.6875 0.520828C14.8958 0.869789 15.8854 1.26041 16.6667 1.6875L15.0833 6.04166C14.401 5.68229 13.6354 5.36979 12.7917 5.10416C11.9583 4.82812 10.9583 4.6875 9.79167 4.6875C8.46875 4.6875 7.52083 4.875 6.9375 5.25C6.35417 5.61458 6.0625 6.16666 6.0625 6.91666C6.0625 7.36458 6.16667 7.73958 6.375 8.04166C6.59375 8.34895 6.90104 8.625 7.29167 8.875C7.67708 9.125 8.125 9.35416 8.625 9.5625C9.13542 9.76041 9.69792 9.95833 10.3125 10.1667C11.5885 10.6406 12.6927 11.1042 13.625 11.5625C14.5677 12.0208 15.3542 12.5573 15.9792 13.1667C16.6042 13.7812 17.0677 14.5 17.375 15.3333C17.6771 16.1562 17.8333 17.1562 17.8333 18.3333C17.8333 20.6146 17.0313 22.3854 15.4375 23.6458C13.8385 24.9115 11.4219 25.5417 8.1875 25.5417C7.10417 25.5417 6.125 25.4688 5.25 25.3333C4.38542 25.2083 3.61458 25.0521 2.9375 24.875C2.27083 24.6823 1.69271 24.4792 1.20833 24.2708C0.71875 24.0521 0.317709 23.849 0 23.6667L1.54167 19.2917C2.27604 19.6823 3.17708 20.0365 4.25 20.3542C5.31771 20.6771 6.63021 20.8333 8.1875 20.8333L8.1875 20.8333Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-4"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(42.1007 7.579178)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M18.875 24.4792C18.6094 23.6354 18.3177 22.7656 18 21.875C17.6771 20.974 17.3646 20.0781 17.0625 19.1875L7.52083 19.1875C7.21354 20.0781 6.90104 20.974 6.58333 21.875C6.26042 22.7656 5.97916 23.6354 5.72916 24.4792L0 24.4792C0.916664 21.8438 1.78125 19.4062 2.60416 17.1667C3.4375 14.9323 4.23958 12.8281 5.02083 10.8542C5.8125 8.86979 6.58854 6.98958 7.35416 5.20833C8.13021 3.43229 8.92708 1.69791 9.75 0L15.0208 0C15.8125 1.69791 16.5938 3.43229 17.375 5.20833C18.151 6.98958 18.9375 8.86979 19.7292 10.8542C20.5208 12.8281 21.3229 14.9323 22.1458 17.1667C22.9792 19.4062 23.8542 21.8438 24.7708 24.4792L18.875 24.4792ZM12.25 5.54166C12.1354 5.89062 11.9635 6.375 11.7292 7C11.4896 7.61458 11.2188 8.32291 10.9167 9.125C10.6094 9.91666 10.2708 10.8021 9.89583 11.7708C9.53125 12.7292 9.16667 13.7396 8.79167 14.7917L15.75 14.7917C15.375 13.7396 15.0052 12.7292 14.6458 11.7708C14.2969 10.8021 13.9635 9.91666 13.6458 9.125C13.3385 8.32291 13.0677 7.61458 12.8333 7C12.5938 6.375 12.401 5.89062 12.25 5.54166L12.25 5.54166Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-5"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(67.58357 7.579178)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M20.2708 0L20.2708 4.6875L12.8958 4.6875L12.8958 24.4792L7.375 24.4792L7.375 4.6875L0 4.6875L0 0L20.2708 0Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-6"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(91.05559 7.579178)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 24.4792L0 0L16.5208 0L16.5208 4.625L5.5 4.625L5.5 9.4375L15.2917 9.4375L15.2917 13.9583L5.5 13.9583L5.5 19.8542L17.3333 19.8542L17.3333 24.4792L0 24.4792Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-7"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(111.05737 7.016678)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M12.2292 25.5417C8.23958 25.5417 5.20833 24.4375 3.125 22.2292C1.04166 20.0104 0 16.8542 0 12.7708C0 10.7604 0.3125 8.95833 0.9375 7.375C1.57291 5.78125 2.44791 4.43229 3.5625 3.33333C4.67188 2.23958 5.98958 1.41145 7.52083 0.854164C9.04688 0.286453 10.7083 0 12.5 0C13.5417 0 14.4844 0.078125 15.3333 0.229164C16.1771 0.385414 16.9219 0.557289 17.5625 0.75C18.1979 0.947914 18.7292 1.15625 19.1458 1.375C19.5729 1.58333 19.8802 1.74479 20.0625 1.85416L18.4792 6.3125C17.7292 5.91145 16.8437 5.57291 15.8333 5.29166C14.8333 5.01562 13.6979 4.875 12.4375 4.875C11.5885 4.875 10.7552 5.01562 9.9375 5.29166C9.1302 5.57291 8.41666 6.02083 7.79166 6.64583C7.16666 7.27083 6.66666 8.08333 6.29166 9.08333C5.91666 10.0729 5.72916 11.2656 5.72916 12.6667C5.72916 13.8073 5.84375 14.8698 6.08333 15.8542C6.33333 16.8281 6.73438 17.6667 7.29166 18.375C7.84375 19.0729 8.5677 19.625 9.45833 20.0417C10.3594 20.4583 11.4427 20.6667 12.7083 20.6667C13.5104 20.6667 14.2344 20.6198 14.875 20.5208C15.5104 20.4271 16.0729 20.3125 16.5625 20.1875C17.0625 20.0521 17.5 19.9062 17.875 19.75C18.25 19.5833 18.5885 19.4323 18.8958 19.2917L20.4167 23.7083C19.6354 24.1667 18.5417 24.5938 17.125 24.9792C15.7187 25.3542 14.0885 25.5417 12.2292 25.5417L12.2292 25.5417Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-8"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(134.66855 7.579178)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M14.7708 0L20.2708 0L20.2708 24.4792L14.7708 24.4792L14.7708 14.0833L5.5 14.0833L5.5 24.4792L0 24.4792L0 0L5.5 0L5.5 9.35416L14.7708 9.35416L14.7708 0Z" id="Shape" fill="#040F33" fill-rule="evenodd" stroke="none" class="svg-elem-9"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(10.73645 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M1.02083 0L2.375 3.79166L3.70833 0L4.72917 0L2.77083 5L1.95833 5L0 0L1.02083 0Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-10"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(17.093365 41.459465)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M2.4375 5.08333C2.07292 5.08333 1.73958 5.01562 1.4375 4.875C1.14583 4.72395 0.885416 4.53125 0.666666 4.29166C0.458332 4.05729 0.291666 3.78645 0.166666 3.47916C0.0520821 3.17708 0 2.86458 0 2.54166C0 2.20833 0.0625 1.89062 0.1875 1.58333C0.3125 1.28125 0.484375 1.01041 0.708332 0.770828C0.927082 0.536453 1.1875 0.348953 1.47917 0.208328C1.78125 0.0729141 2.10938 0 2.45833 0C2.81771 0 3.14583 0.078125 3.4375 0.229164C3.73958 0.385414 4 0.578125 4.20833 0.8125C4.42708 1.05208 4.59375 1.32291 4.70833 1.625C4.83333 1.93229 4.89583 2.24479 4.89583 2.5625C4.89583 2.89583 4.83333 3.21875 4.70833 3.52083C4.58333 3.8125 4.40625 4.07812 4.1875 4.3125C3.97917 4.55208 3.71875 4.73958 3.41667 4.875C3.125 5.01562 2.79688 5.08333 2.4375 5.08333L2.4375 5.08333ZM1 2.54166C1 2.76562 1.02604 2.97916 1.08333 3.1875C1.15104 3.38541 1.25 3.55729 1.375 3.70833C1.5 3.86458 1.65104 3.98958 1.83333 4.08333C2.01042 4.16666 2.21875 4.20833 2.45833 4.20833C2.69271 4.20833 2.90104 4.16666 3.08333 4.08333C3.26042 3.98958 3.41667 3.86458 3.54167 3.70833C3.66667 3.54166 3.75521 3.36458 3.8125 3.16666C3.88021 2.95833 3.91667 2.75 3.91667 2.54166C3.91667 2.32291 3.88021 2.11458 3.8125 1.91666C3.73958 1.70833 3.64583 1.53125 3.52083 1.375C3.39583 1.22395 3.23958 1.10416 3.0625 1.02083C2.88021 0.927078 2.67708 0.875 2.45833 0.875C2.21875 0.875 2.00521 0.927078 1.8125 1.02083C1.63021 1.11979 1.47917 1.24479 1.35417 1.39583C1.23958 1.55208 1.15104 1.72916 1.08333 1.9375C1.02604 2.13541 1 2.33333 1 2.54166L1 2.54166Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-11"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(23.721981 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M4.14583 0.854164L2.5625 0.854164L2.5625 5L1.58333 5L1.58333 0.854164L0 0.854164L0 0L4.14583 0L4.14583 0.854164Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-12"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(29.90665 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 5L0 0L2.20834 0C2.44271 0 2.65625 0.0520859 2.85417 0.145836C3.04688 0.244789 3.21354 0.375 3.35417 0.541664C3.48959 0.697914 3.60417 0.869789 3.6875 1.0625C3.77084 1.26041 3.8125 1.45834 3.8125 1.66666C3.8125 1.98959 3.72917 2.28125 3.5625 2.54166C3.39584 2.80729 3.17188 3 2.89584 3.125L4.04167 5L2.95834 5L1.9375 3.33334L0.979168 3.33334L0.979168 5L0 5ZM0.979168 2.47916L2.1875 2.47916C2.28125 2.47916 2.36459 2.45834 2.4375 2.41666C2.52084 2.375 2.58854 2.32291 2.64584 2.25C2.69792 2.16666 2.73959 2.07812 2.77084 1.97916C2.8125 1.88541 2.83334 1.78125 2.83334 1.66666C2.83334 1.54166 2.8125 1.43229 2.77084 1.33334C2.72917 1.23959 2.67188 1.15625 2.60417 1.08334C2.54688 1.01562 2.47917 0.958336 2.39584 0.916664C2.3125 0.875 2.22917 0.854164 2.14584 0.854164L0.979168 0.854164L0.979168 2.47916Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-13"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(35.998596 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M3.47917 4.14584L3.47917 5L0 5L0 0L3.41667 0L3.41667 0.854164L0.979168 0.854164L0.979168 2.0625L3.08334 2.0625L3.08334 2.85416L0.979168 2.85416L0.979168 4.14584L3.47917 4.14584Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-14"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(44.426376 41.480293)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 2.47917C0 2.17709 0.0520821 1.875 0.166668 1.58334C0.276043 1.28125 0.4375 1.01562 0.645836 0.791672C0.864586 0.557297 1.13021 0.369797 1.4375 0.229172C1.73959 0.078125 2.08854 0 2.47917 0C2.9375 0 3.33334 0.104172 3.66667 0.3125C4 0.510422 4.25 0.765625 4.41667 1.08334L3.66667 1.60417C3.60938 1.46875 3.53125 1.34896 3.4375 1.25C3.33854 1.15625 3.23438 1.07812 3.125 1.02084C3.01042 0.96875 2.90104 0.927086 2.79167 0.895836C2.67708 0.869797 2.5625 0.854172 2.4375 0.854172C2.19792 0.854172 1.98959 0.90625 1.8125 1C1.63021 1.09896 1.47917 1.22917 1.35417 1.39584C1.23959 1.55209 1.15104 1.72396 1.08334 1.91667C1.02604 2.11459 1 2.3125 1 2.52084C1 2.7448 1.03125 2.95834 1.10417 3.16667C1.17188 3.36459 1.27084 3.53646 1.39584 3.6875C1.53125 3.84375 1.69271 3.96875 1.875 4.0625C2.05208 4.16146 2.25 4.20834 2.45834 4.20834C2.56771 4.20834 2.6875 4.19792 2.8125 4.16667C2.9375 4.14062 3.05208 4.09896 3.16667 4.04167C3.27604 3.97396 3.375 3.89062 3.45834 3.79167C3.55208 3.69792 3.63021 3.57813 3.6875 3.4375L4.47917 3.89584C4.40625 4.09375 4.29688 4.26042 4.14584 4.39584C3.98959 4.53646 3.82292 4.66146 3.64584 4.77084C3.46354 4.8698 3.26042 4.94792 3.04167 5C2.83334 5.04167 2.63021 5.0625 2.4375 5.0625C2.07292 5.0625 1.73959 4.98959 1.4375 4.83334C1.14584 4.6823 0.895836 4.48959 0.6875 4.25C0.479168 4.01562 0.3125 3.7448 0.1875 3.4375C0.0625 3.1198 0 2.80209 0 2.47917L0 2.47917Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-15"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(50.97871 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M4.20834 0L4.20834 5L3.22917 5L3.22917 2.875L0.979168 2.875L0.979168 5L0 5L0 0L0.979168 0L0.979168 2.02084L3.22917 2.02084L3.22917 0L4.20834 0Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-16"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(57.63403 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M3.47917 4.14584L3.47917 5L0 5L0 0L3.41667 0L3.41667 0.854164L0.979168 0.854164L0.979168 2.0625L3.08334 2.0625L3.08334 2.85416L0.979168 2.85416L0.979168 4.14584L3.47917 4.14584Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-17"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(63.27528 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M4.08333 5L4.08333 1.6875L2.79166 4.14584L2.27083 4.14584L0.979164 1.6875L0.979164 5L0 5L0 0L1.04166 0L2.52083 2.85416L4.02083 0L5.04166 0L5.04166 5L4.08333 5Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-18"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(70.77565 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 5L0 0L1 0L1 5L0 5Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-19"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(74.19862 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0.979164 1.79166L0.979164 5L0 5L0 0L0.75 0L3.35416 3.29166L3.35416 0L4.33333 0L4.33333 5L3.54166 5L0.979164 1.79166Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-20"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(83.57973 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M1.02083 0L2.375 3.79166L3.70833 0L4.72916 0L2.77083 5L1.95833 5L0 0L1.02083 0Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-21"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(90.249146 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M3.47916 4.14584L3.47916 5L0 5L0 0L3.41666 0L3.41666 0.854164L0.979164 0.854164L0.979164 2.0625L3.08333 2.0625L3.08333 2.85416L0.979164 2.85416L0.979164 4.14584L3.47916 4.14584Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-22"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(95.890396 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 5L0 0L2.20833 0C2.4427 0 2.65625 0.0520859 2.85416 0.145836C3.04688 0.244789 3.21354 0.375 3.35416 0.541664C3.48958 0.697914 3.60416 0.869789 3.6875 1.0625C3.77083 1.26041 3.8125 1.45834 3.8125 1.66666C3.8125 1.98959 3.72916 2.28125 3.5625 2.54166C3.39583 2.80729 3.17187 3 2.89583 3.125L4.04166 5L2.95833 5L1.9375 3.33334L0.979164 3.33334L0.979164 5L0 5ZM0.979164 2.47916L2.1875 2.47916C2.28125 2.47916 2.36458 2.45834 2.4375 2.41666C2.52083 2.375 2.58854 2.32291 2.64583 2.25C2.69791 2.16666 2.73958 2.07812 2.77083 1.97916C2.8125 1.88541 2.83333 1.78125 2.83333 1.66666C2.83333 1.54166 2.8125 1.43229 2.77083 1.33334C2.72916 1.23959 2.67188 1.15625 2.60416 1.08334C2.54688 1.01562 2.47916 0.958336 2.39583 0.916664C2.3125 0.875 2.22916 0.854164 2.14583 0.854164L0.979164 0.854164L0.979164 2.47916Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-23"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(101.607346 41.459465)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M3.35416 1.35416C3.32291 1.32813 3.26041 1.28645 3.16666 1.22916C3.08333 1.16145 2.97916 1.10416 2.85416 1.0625C2.72916 1.01041 2.58854 0.958328 2.4375 0.916664C2.29688 0.875 2.15104 0.854164 2 0.854164C1.73438 0.854164 1.53125 0.90625 1.39583 1C1.27083 1.09895 1.20833 1.23958 1.20833 1.41666C1.20833 1.53125 1.22916 1.61979 1.27083 1.6875C1.32291 1.76041 1.40104 1.82291 1.5 1.875C1.59375 1.91666 1.71354 1.95833 1.85416 2C1.98958 2.04166 2.15625 2.08333 2.35416 2.125C2.60416 2.19791 2.82291 2.27083 3.02083 2.35416C3.21354 2.42708 3.3802 2.51562 3.52083 2.625C3.65625 2.73958 3.76041 2.875 3.83333 3.04166C3.91666 3.19791 3.95833 3.38541 3.95833 3.60416C3.95833 3.88541 3.90625 4.11979 3.8125 4.3125C3.71354 4.49479 3.57291 4.64583 3.39583 4.77083C3.22916 4.88541 3.03125 4.96875 2.8125 5.02083C2.58854 5.07291 2.35416 5.10416 2.10416 5.10416C1.72916 5.10416 1.35416 5.04688 0.979164 4.9375C0.614578 4.8125 0.291664 4.65625 0 4.45833L0.4375 3.60416C0.479164 3.64583 0.552078 3.70313 0.666664 3.77083C0.776039 3.84375 0.90625 3.91145 1.0625 3.97916C1.21354 4.05208 1.3802 4.11458 1.5625 4.16666C1.73958 4.20833 1.92708 4.22916 2.125 4.22916C2.65104 4.22916 2.91666 4.05729 2.91666 3.70833C2.91666 3.59895 2.88541 3.51041 2.83333 3.4375C2.77604 3.36979 2.6875 3.30729 2.5625 3.25C2.44791 3.18229 2.3125 3.125 2.14583 3.08333C1.98958 3.04166 1.8177 2.99479 1.625 2.9375C1.38541 2.86979 1.17708 2.80208 1 2.72916C0.833328 2.64583 0.6875 2.55729 0.5625 2.45833C0.447914 2.34895 0.359375 2.22395 0.291664 2.08333C0.234375 1.94791 0.208328 1.78125 0.208328 1.58333C0.208328 1.32291 0.255203 1.09375 0.354164 0.895828C0.447914 0.703125 0.583328 0.541664 0.75 0.416664C0.916664 0.28125 1.10938 0.177078 1.33333 0.104164C1.55208 0.0364532 1.79166 0 2.04166 0C2.38541 0 2.70833 0.0572891 3 0.166664C3.30208 0.28125 3.5677 0.411453 3.79166 0.5625L3.35416 1.35416Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-24"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(110.807144 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 5L0 0L0.979164 0L0.979164 4.14584L3.52083 4.14584L3.52083 5L0 5Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-25"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(116.24533 41.417793)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 1.5625L0 0L1 0L1 1.5625L0 1.5625Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-26"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(118.913315 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M1.89584 0L2.77084 0L4.66667 5L3.66667 5L3.1875 3.75L1.45834 3.75L1 5L0 5L1.89584 0ZM3.02084 3.0625L2.33334 1.10416L1.60417 3.0625L3.02084 3.0625Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-27"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(125.03374 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M1.02083 0L2.375 3.79166L3.70833 0L4.72917 0L2.77083 5L1.95833 5L0 0L1.02083 0Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-28"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(131.70314 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M3.47917 4.14584L3.47917 5L0 5L0 0L3.41667 0L3.41667 0.854164L0.979172 0.854164L0.979172 2.0625L3.08334 2.0625L3.08334 2.85416L0.979172 2.85416L0.979172 4.14584L3.47917 4.14584Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-29"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(137.34438 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0.979172 1.79166L0.979172 5L0 5L0 0L0.75 0L3.35417 3.29166L3.35417 0L4.33334 0L4.33334 5L3.54167 5L0.979172 1.79166Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-30"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(144.12646 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 5L0 0L1 0L1 5L0 5Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-31"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                        <g id="Group" transform="translate(147.54944 41.50113)">
                                                            <g id="Group">
                                                                <g id="Group">
                                                                    <path d="M0 5L0 0L2.20834 0C2.44272 0 2.65625 0.0520859 2.85417 0.145836C3.04688 0.244789 3.21355 0.375 3.35417 0.541664C3.48959 0.697914 3.60417 0.869789 3.6875 1.0625C3.77084 1.26041 3.8125 1.45834 3.8125 1.66666C3.8125 1.98959 3.72917 2.28125 3.5625 2.54166C3.39584 2.80729 3.17188 3 2.89584 3.125L4.04167 5L2.95834 5L1.9375 3.33334L0.979172 3.33334L0.979172 5L0 5ZM0.979172 2.47916L2.1875 2.47916C2.28125 2.47916 2.36459 2.45834 2.4375 2.41666C2.52084 2.375 2.58855 2.32291 2.64584 2.25C2.69792 2.16666 2.73959 2.07812 2.77084 1.97916C2.8125 1.88541 2.83334 1.78125 2.83334 1.66666C2.83334 1.54166 2.8125 1.43229 2.77084 1.33334C2.72917 1.23959 2.67188 1.15625 2.60417 1.08334C2.54688 1.01562 2.47917 0.958336 2.39584 0.916664C2.3125 0.875 2.22917 0.854164 2.14584 0.854164L0.979172 0.854164L0.979172 2.47916Z" id="Shape" fill="#EE6D9E" fill-rule="evenodd" stroke="none" class="svg-elem-32"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <use xlink:href="#img_1" fill="#FFFFFF" stroke="none" transform="matrix(0.29166666 0 0 0.29166666 150 36)"></use>
                                            </g>
                                        </svg>

                                    </div>
                                    <div class="-mr-2">
                                        <PopoverButton class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-pink-500">
                                            <span class="sr-only">Close menu</span>
                                            <XIcon class="h-6 w-6" aria-hidden="true" />
                                        </PopoverButton>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <nav class="grid grid-cols-1 gap-7">
                                        <a v-for="item in solutions" :key="item.name" :href="item.href" class="-m-3 p-3 flex items-center rounded-lg hover:bg-gray-50">
                                            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-gradient-to-r from-purple-600 to-pink-600 text-white">
                                                <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                                            </div>
                                            <div class="ml-4 text-base font-medium text-gray-900">
                                                {{ item.name }}
                                            </div>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                            <div class="py-6 px-5">
                                <div class="grid grid-cols-2 gap-4">
                                    <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                        Pricing
                                    </a>
                                    <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                        Partners
                                    </a>
                                    <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                                        Company
                                    </a>
                                </div>
                                <div class="mt-6">
                                    <a href="#" class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-pink-600 bg-origin-border px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-purple-700 hover:to-pink-700">
                                        Sign up
                                    </a>
                                    <p class="mt-6 text-center text-base font-medium text-gray-500">
                                        Existing customer?
                                        <a href="#" class="text-gray-900">
                                            Sign in
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </PopoverPanel>
                </transition>
            </Popover>
        </header>

        <main>
            <!-- Hero section -->
            <div class="relative">
                <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100" />
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
                        <div class="absolute inset-0">
                            <img class="h-full w-full object-cover" src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1654855026/pexels-startup-stock-photos-7070_q52ate.jpg" alt="People working on laptops" />
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-800 to-pink-700 mix-blend-multiply" />
                        </div>
                        <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                            <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                                <span class="block text-white">ISATECH</span>
                                <span class="block text-pink-200">Toujours aux côtés de nos clients et partenaires</span>
                            </h1>
                            <p class="mt-6 max-w-lg mx-auto text-center text-xl text-pink-200 sm:max-w-3xl">
                                nous ne sommes pas une simple entreprise. nous serons impliqués dans tous les aspects du parcours de votre projet
                            </p>
                            <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                                <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-pink-500 bg-opacity-60 hover:bg-opacity-70 sm:px-8">
                                    Live demo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo Cloud -->
            <div class="bg-gray-100">
                <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-sm font-semibold uppercase text-gray-500 tracking-wide">
                        LA CONFIANCE DE PLUS DE 5 PETITES ENTREPRISES
                    </p>
                    <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg" alt="Tuple" />
                        </div>
                        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg" alt="Mirage" />
                        </div>
                        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg" alt="StaticKit" />
                        </div>
                        <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg" alt="Transistor" />
                        </div>
                        <div class="col-span-2 flex justify-center md:col-span-2 md:col-start-4 lg:col-span-1">
                            <img class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg" alt="Workcation" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alternating Feature Sections -->
            <div class="relative pt-16 pb-32 overflow-hidden">
                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-gray-100" />
                <div class="relative">
                    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
                        <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0">
                            <div>
                                <div>
                  <span class="h-12 w-12 rounded-md flex items-center justify-center bg-gradient-to-r from-purple-600 to-pink-600">
                    <InboxIcon class="h-6 w-6 text-white" aria-hidden="true" />
                  </span>
                                </div>
                                <div class="mt-6">
                                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
                                        Restez au top du support client                                    </h2>
                                    <p class="mt-4 text-lg text-gray-500">
                                        Un excellent service client n’est pas nécessairement facile à construire et requiert du temps avant de pouvoir constater un ROI positif.

                                        Cependant, vous devez vous rappeler la valeur que cela représente pour votre organisation et vous concentrer sur le développement à long terme de relations profitables entre les consommateurs et votre entreprise.
                                    </p>
                                    <div class="mt-6">
                                        <a href="#" class="inline-flex bg-gradient-to-r from-purple-600 to-pink-600 bg-origin-border px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-purple-700 hover:to-pink-700">
                                            Commencer
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 border-t border-gray-200 pt-6">
                                <blockquote>
                                    <div>
                                        <p class="text-base text-gray-500">
                                            &ldquo;travailler avec "ISATECH" est vraiment incroyable. en raison de la plus grande équipe et du flux de travail incroyable .&rdquo;
                                        </p>
                                    </div>
                                    <footer class="mt-3">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-6 w-6 rounded-full" src="https://images.unsplash.com/photo-1509783236416-c9ad59bae472?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="" />
                                            </div>
                                            <div class="text-base font-medium text-gray-700">
                                                Marcia Hill, Digital Marketing Manager
                                            </div>
                                        </div>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                        <div class="mt-12 sm:mt-16 lg:mt-0">
                            <div class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                                <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1654856469/2.1._Tickets_ssptkl.png" alt="Inbox user interface" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-24">
                    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
                        <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2">
                            <div>
                                <div>
                  <span class="h-12 w-12 rounded-md flex items-center justify-center bg-gradient-to-r from-purple-600 to-pink-600">
                    <SparklesIcon class="h-6 w-6 text-white" aria-hidden="true" />
                  </span>
                                </div>
                                <div class="mt-6">
                                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">
                                        Mieux comprendre vos clients
                                    </h2>
                                    <p class="mt-4 text-lg text-gray-500">
                                        Pour mieux comprendre ses clients, il faut aujourd’hui s’attacher aux comportements des internautes. Le comportement des clients sur le web est très varié mais ces derniers n’hésitent pas à donner leurs avis. Qu’il soit négatif ou positif, un avis est un véritable baromètre de la réputation d’une entreprise.
                                    </p>
                                    <div class="mt-6">
                                        <a href="#" class="inline-flex bg-gradient-to-r from-purple-600 to-pink-600 bg-origin-border px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-purple-700 hover:to-pink-700">
                                            Commencer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
                            <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                                <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/inbox-app-screenshot-2.jpg" alt="Customer profile user interface" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gradient Feature Section -->
            <div class="bg-gradient-to-r from-purple-800 to-pink-700">
                <div class="max-w-4xl mx-auto px-4 py-16 sm:px-6 sm:pt-20 sm:pb-24 lg:max-w-7xl lg:pt-24 lg:px-8">
                    <h2 class="text-3xl font-extrabold text-white tracking-tight">
                        Nos services
                    </h2>

                    <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-4 lg:gap-x-8 lg:gap-y-16">
                        <div v-for="feature in features" :key="feature.name">
                            <div>
                <span class="flex items-center justify-center h-12 w-12 rounded-md bg-white bg-opacity-10">
                  <img :src="feature.icon" class="h-6 w-6 text-white" aria-hidden="true" alt="feature-icon" />
                </span>
                            </div>
                            <div class="mt-6">
                                <h3 class="text-lg font-medium text-white">{{ feature.name }}</h3>
                                <p class="mt-2 text-base text-purple-200">
                                    {{ feature.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats section -->
            <div class="relative bg-slate-900">
                <div class="h-80 absolute inset-x-0 bottom-0 xl:top-0 xl:h-full">
                    <div class="h-full w-full xl:grid xl:grid-cols-2">
                        <div class="h-full xl:relative xl:col-start-2">
                            <img class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0" src="https://res.cloudinary.com/dy6vgsgr8/image/upload/v1654858663/pexels-aleksey-3680959_ntp9fh.jpg" alt="People working on laptops" />
                            <div aria-hidden="true" class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r" />
                        </div>
                    </div>
                </div>
                <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-cols-2 xl:grid-flow-col-dense xl:gap-x-8">
                    <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
                        <h2 class="text-sm font-semibold tracking-wide uppercase">
                            <span class="bg-gradient-to-r from-purple-300 to-pink-300 bg-clip-text text-transparent">Réalisations</span>
                        </h2>
                        <p class="mt-3 text-3xl font-extrabold text-white">Confiez vos projets à des professionnels</p>
                        <p class="mt-5 text-lg text-gray-300">création de votre projet a besoin de plus qu'un entrepreneur. vous avez besoin d'expertise et d'un vrai esprit de collaboration et d'équipe.
                        </p>
                        <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
                            <p v-for="item in metrics" :key="item.id">
                                <span class="block text-2xl font-bold text-white">{{ item.stat }}</span>
                                <span class="mt-1 block text-base text-gray-300"
                                ><span class="font-medium text-white">{{ item.emphasis }}</span> {{ item.rest }}</span
                                >
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-white">
                <div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8 lg:flex lg:items-center lg:justify-between">
                    <h2 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        <span class="block">Ready to Commencer?</span>
                        <span class="block bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Get in touch or create an account.</span>
                    </h2>
                    <div class="mt-6 space-y-4 sm:space-y-0 sm:flex sm:space-x-5">
                        <a href="#" class="flex items-center justify-center bg-gradient-to-r from-purple-600 to-pink-600 bg-origin-border px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-purple-700 hover:to-pink-700">
                            Learn more
                        </a>
                        <a href="#" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-pink-800 bg-pink-50 hover:bg-pink-100">
                            Commencer
                        </a>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-gray-50" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto pt-16 pb-8 px-4 sm:px-6 lg:pt-24 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="grid grid-cols-2 gap-8 xl:col-span-2">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Solutions
                                </h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li v-for="item in footerNavigation.solutions" :key="item.name">
                                        <a :href="item.href" class="text-base text-gray-500 hover:text-gray-900">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Support
                                </h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li v-for="item in footerNavigation.support" :key="item.name">
                                        <a :href="item.href" class="text-base text-gray-500 hover:text-gray-900">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Company
                                </h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li v-for="item in footerNavigation.company" :key="item.name">
                                        <a :href="item.href" class="text-base text-gray-500 hover:text-gray-900">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                                    Legal
                                </h3>
                                <ul role="list" class="mt-4 space-y-4">
                                    <li v-for="item in footerNavigation.legal" :key="item.name">
                                        <a :href="item.href" class="text-base text-gray-500 hover:text-gray-900">
                                            {{ item.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 xl:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">
                            Subscribe to our newsletter
                        </h3>
                        <p class="mt-4 text-base text-gray-500">
                            The latest news, articles, and resources, sent to your inbox weekly.
                        </p>
                        <form class="mt-4 sm:flex sm:max-w-md">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input type="email" name="email-address" id="email-address" autocomplete="email" required="" class="appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-pink-500 focus:border-pink-500 focus:placeholder-gray-400" placeholder="Enter your email" />
                            <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                                <button type="submit" class="w-full flex items-center justify-center bg-gradient-to-r from-purple-600 to-pink-600 bg-origin-border px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-purple-700 hover:to-pink-700">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between lg:mt-16">
                    <div class="flex space-x-6 md:order-2">
                        <a v-for="item in footerNavigation.social" :key="item.name" :href="item.href" class="text-gray-400 hover:text-gray-500">
                            <span class="sr-only">{{ item.name }}</span>
                            <component :is="item.icon" class="h-6 w-6" aria-hidden="true" />
                        </a>
                    </div>
                    <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                        &copy; 2020 Workflow, Inc. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
import { defineComponent, h } from 'vue'
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {
    AnnotationIcon,
    ChatAlt2Icon,
    ChatAltIcon,
    DocumentReportIcon,
    HeartIcon,
    InboxIcon,
    MenuIcon,
    PencilAltIcon,
    QuestionMarkCircleIcon,
    ReplyIcon,
    SparklesIcon,
    TrashIcon,
    UsersIcon,
    XIcon,
} from '@heroicons/vue/outline'
import { ChevronDownIcon } from '@heroicons/vue/solid'

const solutions = [
    {
        name: 'Digital marketing',
        description: 'Get all traffic with organic since.',
        href: '#',
        icon: InboxIcon,
    },
    {
        name: 'Development informatique et Génie logiciels',
        description: 'Speak directly to your customers in a more meaningful way.',
        href: '#',
        icon: AnnotationIcon,
    },
    { name: 'Aménagement Interieur', description: "Your customers' data will be safe and secure.", href: '#', icon: ChatAlt2Icon },
    {
        name: 'Constructions et Maçonnerie',
        description: "Connect with third-party tools that you're already using.",
        href: '#',
        icon: QuestionMarkCircleIcon,
    },
]
const features = [
    {
        name: 'Services de contructions',
        description: 'Les services de construction et services d\'ingénierie connexes incluent les travaux de construction de bâtiments et de génie civil, les travaux d\'installation et d\'assemblage, les travaux d\'achèvement et de finition.',
        icon: 'https://res.cloudinary.com/dy6vgsgr8/image/upload/v1654863918/icons8-construction-64_c1gr0p.png',
    },
    {
        name: 'Aménagement interieur',
        description: 'Conçoit l\'aménagement (décoration, second oeuvre, ...) d\'espaces de vie professionnels, culturels, privés selon la réglementation et les contraintes techniques particulières. Effectue le suivi du chantier (menuiserie, électricité, ...) jusqu\'à la réception des travaux.',
        icon: 'https://res.cloudinary.com/dy6vgsgr8/image/upload/v1654863650/icons8-decorator-64_1_bilzty.png',
    },
    {
        name: 'Ingénieurie logiciel et réseaux',
        description: 'créer des sites Web et des applications mobiles. pour tout type d\'entreprise. Avec des technologies de pointe et une infrastructure basée sur le cloud',
        icon: 'https://res.cloudinary.com/dy6vgsgr8/image/upload/v1654864763/icons8-solidworks-50_e4cjfi.png',
    },
    {
        name: 'Digital marketing',
        description: '\n' +
            'Nous mettons tout en œuvre pour que nos techniques soient conformes aux différentes directives des moteurs de recherche, tout en offrant une transparence totale à nos clients. Pour nos clients, nous recommandons toujours l\'approche à long terme du référencement axée sur le contenu, en suivant les méthodes de référencement white-hat qui récompensent le site Web pour un contenu engageant et intéressant et évitent les pénalités associées au référencement black-hat. Veuillez consulter nos études de cas démontrant l\'historique de nos résultats pour le prouver..',
        icon: 'https://res.cloudinary.com/dy6vgsgr8/image/upload/v1654862209/icons8-building-arrow-64_rkrxi4.png',
    },
]
const metrics = [
    { id: 1, stat: '5', emphasis: 'Entreprises', rest: 'qui nous donnent confiance.' },
    { id: 2, stat: '25', emphasis: 'Projects', rest: ' finis.' },
    { id: 3, stat: '100%', emphasis: 'Satisfaction des clients', rest: '' },
    { id: 4, stat: '45+', emphasis: 'mise en œuvre commerciale', rest: "par des pro's." },
]
const footerNavigation = {
    solutions: [
        { name: 'Marketing', href: '#' },
        { name: 'Developement', href: '#' },
        { name: 'Contruction', href: '#' },
        { name: 'Aménagement', href: '#' },
    ],
    support: [
        { name: 'Pricing', href: '#' },
        { name: 'Documentation', href: '#' },
        { name: 'Guides', href: '#' },
        { name: 'API Status', href: '#' },
    ],
    company: [
        { name: 'About', href: '#' },
        { name: 'Blog', href: '#' },
        { name: 'Jobs', href: '#' },
        { name: 'Press', href: '#' },
        { name: 'Partners', href: '#' },
    ],
    legal: [
        { name: 'Claim', href: '#' },
        { name: 'Privacy', href: '#' },
        { name: 'Terms', href: '#' },
    ],
    social: [
        {
            name: 'Facebook',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d:
                                'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
        {
            name: 'Instagram',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d:
                                'M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
        {
            name: 'Twitter',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            d:
                                'M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84',
                        }),
                    ]),
            }),
        },
        {
            name: 'GitHub',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d:
                                'M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
        {
            name: 'Dribbble',
            href: '#',
            icon: defineComponent({
                render: () =>
                    h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
                        h('path', {
                            'fill-rule': 'evenodd',
                            d:
                                'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z',
                            'clip-rule': 'evenodd',
                        }),
                    ]),
            }),
        },
    ],
}

export default {
    components: {
        Popover,
        PopoverButton,
        PopoverGroup,
        PopoverPanel,
        ChevronDownIcon,
        InboxIcon,
        MenuIcon,
        SparklesIcon,
        XIcon,
    },
    name : 'Landingone',
    setup() {
        return {
            solutions,
            features,
            metrics,
            footerNavigation,
        }
    },
}
</script>
