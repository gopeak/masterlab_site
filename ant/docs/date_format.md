 
  ### 时间格式说明
   
   <table class="doctable table">
   <thead>
   <tr><th><code class="parameter">format</code>字符</th><th>说明</th><th>返回值例子</th></tr>
   </thead>
   <tbody class="tbody">
   <tr>
   <td><em class="emphasis">日</em></td>
   <td>---</td>
   <td>---</td>
   </tr>
   <tr>
   <td><em>d</em></td>
   <td>月份中的第几天，有前导零的 2 位数字</td>
   <td><em>01</em>&nbsp;到&nbsp;<em>31</em></td>
   </tr>
   <tr>
   <td><em>D</em></td>
   <td>星期中的第几天，文本表示，3 个字母</td>
   <td><em>Mon</em>&nbsp;到&nbsp;<em>Sun</em></td>
   </tr>
   <tr>
   <td><em>j</em></td>
   <td>月份中的第几天，没有前导零</td>
   <td><em>1</em>&nbsp;到&nbsp;<em>31</em></td>
   </tr>
   <tr>
   <td><em>l</em>（“L”的小写字母）</td>
   <td>星期几，完整的文本格式</td>
   <td><em>Sunday</em>&nbsp;到&nbsp;<em>Saturday</em></td>
   </tr>
   <tr>
   <td><em>N</em></td>
   <td>ISO-8601 格式数字表示的星期中的第几天 </td>
   <td><em>1</em>（表示星期一）到&nbsp;<em>7</em>（表示星期天）</td>
   </tr>
   <tr>
   <td><em>S</em></td>
   <td>每月天数后面的英文后缀，2 个字符</td>
   <td><em>st</em>，<em>nd</em>，<em>rd</em>&nbsp;或者&nbsp;<em>th</em>。可以和&nbsp;<em>j</em>&nbsp;一起用</td>
   </tr>
   <tr>
   <td><em>w</em></td>
   <td>星期中的第几天，数字表示</td>
   <td><em>0</em>（表示星期天）到&nbsp;<em>6</em>（表示星期六）</td>
   </tr>
   <tr>
   <td><em>z</em></td>
   <td>年份中的第几天</td>
   <td><em>0</em>&nbsp;到&nbsp;<em>365</em></td>
   </tr>
   <tr>
   <td><em class="emphasis">星期</em></td>
   <td>---</td>
   <td>---</td>
   </tr>
   <tr>
   <td><em>W</em></td>
   <td>ISO-8601 格式年份中的第几周，每周从星期一开始</td>
   <td>例如：<em>42</em>（当年的第 42 周）</td>
   </tr>
   <tr>
   <td><em class="emphasis">月</em></td>
   <td>---</td>
   <td>---</td>
   </tr>
   <tr>
   <td><em>F</em></td>
   <td>月份，完整的文本格式，例如 January 或者 March</td>
   <td><em>January</em>&nbsp;到&nbsp;<em>December</em></td>
   </tr>
   <tr>
   <td><em>m</em></td>
   <td>数字表示的月份，有前导零</td>
   <td><em>01</em>&nbsp;到&nbsp;<em>12</em></td>
   </tr>
   <tr>
   <td><em>M</em></td>
   <td>三个字母缩写表示的月份</td>
   <td><em>Jan</em>&nbsp;到&nbsp;<em>Dec</em></td>
   </tr>
   <tr>
   <td><em>n</em></td>
   <td>数字表示的月份，没有前导零</td>
   <td><em>1</em>&nbsp;到&nbsp;<em>12</em></td>
   </tr>
   <tr>
   <td><em class="emphasis">年</em></td>
   <td>---</td>
   <td>---</td>
   </tr>
   <tr>
   <td><em>L</em></td>
   <td>是否为闰年</td>
   <td>如果是闰年为&nbsp;<em>1</em>，否则为&nbsp;<em>0</em></td>
   </tr>
   <tr>
   <td><em>o</em></td>
   <td>ISO-8601 格式年份数字。</td>
   <td>Examples:&nbsp;<em>1999</em>&nbsp;or&nbsp;<em>2003</em></td>
   </tr>
   <tr>
   <td><em>Y</em></td>
   <td>4 位数字完整表示的年份</td>
   <td>例如：<em>1999</em>&nbsp;或&nbsp;<em>2003</em></td>
   </tr>
   <tr>
   <td><em>y</em></td>
   <td>2 位数字表示的年份</td>
   <td>例如：<em>99</em>&nbsp;或&nbsp;<em>03</em></td>
   </tr>
   <tr>
   <td><em class="emphasis">时间</em></td>
   <td>---</td>
   <td>---</td>
   </tr>
   <tr>
   <td><em>a</em></td>
   <td>小写的上午和下午值</td>
   <td><em>am</em>&nbsp;或&nbsp;<em>pm</em></td>
   </tr>
   <tr>
   <td><em>A</em></td>
   <td>大写的上午和下午值</td>
   <td><em>AM</em>&nbsp;或&nbsp;<em>PM</em></td>
   </tr>
   <tr>
   <td><em>g</em></td>
   <td>小时，12 小时格式，没有前导零</td>
   <td><em>1</em>&nbsp;到&nbsp;<em>12</em></td>
   </tr>
   <tr>
   <td><em>G</em></td>
   <td>小时，24 小时格式，没有前导零</td>
   <td><em>0</em>&nbsp;到&nbsp;<em>23</em></td>
   </tr>
   <tr>
   <td><em>h</em></td>
   <td>小时，12 小时格式，有前导零</td>
   <td><em>01</em>&nbsp;到&nbsp;<em>12</em></td>
   </tr>
   <tr>
   <td><em>H</em></td>
   <td>小时，24 小时格式，有前导零</td>
   <td><em>00</em>&nbsp;到&nbsp;<em>23</em></td>
   </tr>
   <tr>
   <td><em>i</em></td>
   <td>有前导零的分钟数</td>
   <td><em>00</em>&nbsp;到&nbsp;<em>59</em>&gt;</td>
   </tr>
   <tr>
   <td><em>s</em></td>
   <td>秒数，有前导零</td>
   <td><em>00</em>&nbsp;到&nbsp;<em>59</em>&gt;</td>
   </tr>

   </tbody>
   </table>

