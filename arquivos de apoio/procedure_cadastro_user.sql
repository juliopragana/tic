CREATE PROCEDURE `sp_user_save`(
pusername VARCHAR(45),
pemail VARCHAR(45),
psenha VARCHAR(255),
pdataregistro timestamp,
pstatus_user INT(5)
) 
BEGIN 
	DECLARE vid_user INT; 

	INSERT INTO tb_user (id_user, username, email, senha, dataregistro, status_user) 
				VALUES (vid_user, pusername, pemail, psenha, pdataregistro, pstatus_user); 

	SELECT * FROM tb_user WHERE id_user = LAST_INSERT_ID();

END

