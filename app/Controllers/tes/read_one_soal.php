					<?php foreach($data["soal"] as $soal){?>
						<?php echo $soal["soal"]?><br>
							<ul style="list-style-type: none;">
								<li><input type='radio' name='<?php echo $soal["id_soal"];?>' onclick='set_answer("<?php echo $soal["id_soal"];?>","A");' value='A'><?php echo $soal["pil_a"]?></li>
								<li><input type='radio' onclick='set_answer("<?php echo $soal["id_soal"];?>","B");' name='<?php echo $soal["id_soal"];?>' value='B'><?php echo $soal["pil_b"]?></li>
								<li><input type='radio' name='<?php echo $soal["id_soal"];?>' onclick='set_answer("<?php echo $soal["id_soal"];?>","C");' value='C'><?php echo $soal["pil_c"]?></li>
								<li><input type='radio' name='<?php echo $soal["id_soal"];?>' onclick='set_answer("<?php echo $soal["id_soal"];?>","D");' value='D'><?php echo $soal["pil_d"]?></li>
							</ul>
					<?php }?>
					<button class="btn btn-primary button-prev"  type="button">Prev</button>
					<button class="btn btn-primary button-next" type="button">Next</button>
					<button class="btn btn-primary" onclick="send_answer();" type="button">Selesai</button>
				
