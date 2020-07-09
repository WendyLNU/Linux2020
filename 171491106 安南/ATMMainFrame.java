package atm;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.GridLayout;
import java.awt.Toolkit;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.util.Scanner;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;

public class ATMMainFrame extends JFrame {

	private Account account;
	private Bank bank;
	
	private JButton jbDeposit,jbWithdraw,jbCancel,jbQuery,jbTransfer;
	private JLabel jblMsg,jblName;
	private JPanel jp1,jp2,jp3,jp4;
	/**
	 * @param args
	 */
	public ATMMainFrame(final Bank bank,Account tmpA){
		this.account=tmpA;
		this.bank=bank;
		jbQuery=new JButton("��ѯ");
		jbDeposit=new JButton("���");
		jbWithdraw=new JButton("ȡ��");
		jbTransfer=new JButton("ת��");
		jbCancel=new JButton("�˿�");	
		jblName=new JLabel("�˻�����: "+account.getName());
		jblMsg=new JLabel();
		jp1=new JPanel();
		jp2=new JPanel();
		jp3=new JPanel();
		jp4=new JPanel();
		
		jp1.add(jbQuery);
		jp1.add(jbDeposit);
		jp2.add(jbWithdraw);
		jp2.add(jbTransfer);
		jp3.add(jbCancel);
		jp4.add(jblName);
		jp4.add(jblMsg);
		//��ÿ��������ӵ�frame��
		this.add(jp1);
		this.add(jp2);
		this.add(jp3);
		this.add(jp4);
		this.setLayout(new GridLayout(4, 1));
		Dimension d=Toolkit.getDefaultToolkit().getScreenSize();
		this.setTitle("��������");
		this.setBounds((d.width-300)/2, (d.height-200)/2, 300, 200);
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);//���ùرմ���ʱJVMͬʱ�Ƴ�
		//this.pack();//�����������������������С�ߴ�
		this.setVisible(true);//���ô��ڿɼ�
		this.setResizable(false);
		
		//ʹ�������ڲ������ѯ��ťע�������
		jbQuery.addActionListener(
			new ActionListener() {	
				public void actionPerformed(ActionEvent e) {
					JOptionPane.showMessageDialog(null, "���˻��ĵ�ǰ���Ϊ:"+account.getBalance(),
							"��Ϣ��ʾ",JOptionPane.INFORMATION_MESSAGE);
				}
			}
		);
		//����ťע�������
		jbDeposit.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent arg0) {
					String  s= JOptionPane.showInputDialog("����������:");
					double money=Double.parseDouble((s.equals("")?"0":s));
					bank.deposit(account, money);
					JOptionPane.showMessageDialog(null, "���ɹ�������","��Ϣ��ʾ",
				              JOptionPane.INFORMATION_MESSAGE);
					jblName=new JLabel("�˻�����: "+account.getName());
					jblMsg.setText("���: "+account.getBalance());
				}
			}
					
		);
		//��ȡ�ťע�������
		jbWithdraw.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent arg0) {
					String  s= JOptionPane.showInputDialog("������ȡ����:");
					double money=Double.parseDouble((s.equals("")?"0":s));
					bank.withdraw(account, money);
					jblName=new JLabel("�˻�����: "+account.getName());
					jblMsg.setText("���: "+account.getBalance());
				}
			}
				
		);
		//��ת�˰�ťע�������
		jbTransfer.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					String sId = JOptionPane.showInputDialog("������Ҫת�˵Ŀ���:");
					long id2 = Long.parseLong(sId);
					Account account2 = bank.verifyAccount(id2);
					if(account2 != null)
					{
						String sNum = JOptionPane.showInputDialog("��������Ҫת���˻��Ľ��:");
						double money=Double.parseDouble((sNum.equals("")?"0":sNum));
						if(money <= account.balance)
						{
							bank.transferAccount(account, account2, money);
							JOptionPane.showMessageDialog(null, "ת�˳ɹ�������","��Ϣ��ʾ",
						              JOptionPane.INFORMATION_MESSAGE);
						}
						else
						{
							JOptionPane.showMessageDialog(null, "��Ǹ�����˻�û���㹻�Ľ���鿴������ѡ�����룡",
									"��Ϣ��ʾ",JOptionPane.ERROR_MESSAGE);
						}
					}
					else
					{
						JOptionPane.showMessageDialog(null, "��Ǹ��û���ҵ���Ҫת����˻���Ϣ����˶Ժ�����ѡ�����룡","��Ϣ��ʾ",
					              JOptionPane.ERROR_MESSAGE);
					}
					jblName=new JLabel("�˻�����: "+account.getName());
					jblMsg.setText("���: "+account.getBalance());
				}
			}	
		);
		//���˿���ťע�������
		jbCancel.addActionListener(
			new ActionListener() {
				public void actionPerformed(ActionEvent e) {
					bank.saveAccountDate();
					dispose();//�رմ���
				}
			}	
		);
		
	}
	

}

