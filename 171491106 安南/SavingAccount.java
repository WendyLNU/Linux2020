package atm;

import javax.swing.JOptionPane;

/**
 * �����˻���
 */
public class SavingAccount extends Account {
	//���캯��
	public SavingAccount() {
		super();
	}

	public SavingAccount(long id, String password, String name, 
			String personId,String accountType, double balance) {
		super(id, password, name, personId, accountType, balance);
	}
	//�Ը����withdraw()ʵ��
	public void withdraw(double money){
		if(balance < money){
			JOptionPane.showMessageDialog(null, "�Բ����˻����㣡",
					"��Ϣ��ʾ",JOptionPane.ERROR_MESSAGE);
		}
		else
		{
			balance -= money;			
		}
	}
}
